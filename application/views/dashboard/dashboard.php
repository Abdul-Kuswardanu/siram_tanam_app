<?php include(APPPATH . 'views/inc/header.php'); ?>

<div class="main-content">
    <h1 class="mb-4">🏠 Dashboard Smart Siram</h1>

    <!-- Modal Tambah Alat -->
    <div class="modal fade" id="modalTambahAlat" tabindex="-1">
        <div class="modal-dialog">
            <form method="post" action="<?= site_url('smartsiram/tambah_alat') ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Alat Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Alat</label>
                            <input type="text" name="nama_alat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kode Alat</label>
                            <input type="text" name="kode_alat" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">💾 Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Hapus Alat -->
    <div class="modal fade" id="modalHapusAlat" tabindex="-1">
        <div class="modal-dialog">
            <form method="post" action="<?= site_url('smartsiram/hapus_alat') ?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Alat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Pilih alat yang ingin dihapus:</p>
                        <select name="id" class="form-select" required>
                            <?php foreach ($alat as $a): ?>
                                <option value="<?= $a->id ?>"><?= $a->nama_alat ?> (<?= $a->status ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">🗑️ Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Status Alat -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h4 class="fw-bold mb-3">🔌 Status Alat</h4>

            <?php if (!empty($alat)): ?>
                <form method="post" action="<?= site_url('smartsiram/update_status') ?>">
                    <div class="mb-3">
                        <label class="form-label">Pilih Alat Aktif</label>
                        <div class="input-group">
                            <select name="id" class="form-select" required>
                                <?php foreach ($alat as $a): ?>
                                        <option value="<?= $a->id ?>" <?= (isset($alat_aktif) && is_object($alat_aktif) && property_exists($alat_aktif, 'id') && $alat_aktif->id == $a->id) ? 'selected' : '' ?>>
                                        <?= $a->nama_alat ?> <?= $a->status == 'aktif' ? '(AKTIF)' : '' ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" name="status" value="aktif" class="btn btn-success px-3">✅ Aktifkan</button>
                            <button type="submit" name="status" value="nonaktif" class="btn btn-danger px-3 ms-2">❌ Nonaktifkan</button>
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <p class="text-muted">Belum ada alat terdaftar.</p>
            <?php endif; ?>

            <?php if ($total_alat < 3): ?>
                <button class="btn btn-secondary mt-2" data-bs-toggle="modal" data-bs-target="#modalTambahAlat">➕ Tambah Alat</button>
            <?php endif; ?>

            <?php if ($total_alat > 0): ?>
                <button class="btn btn-outline-danger mt-2 ms-2" data-bs-toggle="modal" data-bs-target="#modalHapusAlat">🗑️ Hapus Alat</button>
            <?php endif; ?>
        </div>
    </div>

    <!-- Tanaman yang Sudah Disiram Hari Ini -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h4 class="fw-bold mb-3">🌿 Tanaman yang Sudah Disiram Hari Ini</h4>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Tanaman</th>
                            <th>Waktu Penyiraman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Lidah Buaya</td><td>07:00</td></tr>
                        <tr><td>2</td><td>Kaktus Mini</td><td>16:00</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Jadwal Penyiraman Aktif -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h4 class="fw-bold mb-3">⏰ Jadwal Penyiraman Aktif</h4>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Hari</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>07:00</td><td>09:00</td><td>Setiap Hari</td></tr>
                        <tr><td>2</td><td>16:00</td><td>17:00</td><td>Senin, Rabu, Jumat</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- 📈 Grafik Dummy Line Chart -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h4 class="fw-bold mb-3">📈 Perbandingan Jadwal Tanaman vs Area</h4>
            <canvas id="grafikLine" height="200"></canvas>
        </div>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikLine').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Tanaman', 'Area'],
            datasets: [{
                label: 'Jumlah Jadwal',
                data: [6, 3], // dummy data
                borderColor: '#4caf50',
                backgroundColor: '#4caf50',
                tension: 0.4,
                fill: false,
                pointRadius: 6,
                pointHoverRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: (ctx) => `${ctx.raw} jadwal aktif`
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
</script>

<?php include(APPPATH . 'views/inc/footer.php'); ?>
