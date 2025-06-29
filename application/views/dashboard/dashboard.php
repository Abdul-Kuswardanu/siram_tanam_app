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
                        <p class="mb-2">Pilih alat yang ingin dihapus:</p>
                        <select name="id_alat" class="form-select" required>
                            <?php foreach ($alat as $a): ?>
                                <option value="<?= $a->id_alat ?>"><?= $a->nama_alat ?> (<?= $a->status ?>)</option>
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
                <div class="mb-3">
                    <strong>Status Alat Terpilih:</strong>
                    <span id="statusBadge" class="badge p-2"></span>
                </div>

                <form method="post" action="<?= site_url('smartsiram/update_status') ?>">
                    <div class="row g-2 align-items-end">
                        <div class="col-md-6">
                            <label class="form-label">Pilih Alat</label>
                            <select name="id_alat" id="selectAlat" class="form-select" required>
                                <?php foreach ($alat as $a): ?>
                                    <option 
                                        value="<?= $a->id_alat ?>" 
                                        data-status="<?= $a->status ?>"
                                        <?= (isset($alat_aktif) && $alat_aktif->id_alat == $a->id_alat) ? 'selected' : '' ?>>
                                        <?= $a->nama_alat ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 d-flex gap-2 mt-4 mt-md-0">
                            <button type="submit" name="status" value="aktif" class="btn btn-success w-50">Aktifkan</button>
                            <button type="submit" name="status" value="nonaktif" class="btn btn-danger w-50">Nonaktifkan</button>
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <p class="text-muted">Belum ada alat terdaftar.</p>
            <?php endif; ?>

            <div class="mt-3">
                <?php if ($total_alat < 3): ?>
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalTambahAlat">➕ Tambah Alat</button>
                <?php endif; ?>
                <?php if ($total_alat > 0): ?>
                    <button class="btn btn-outline-danger ms-2" data-bs-toggle="modal" data-bs-target="#modalHapusAlat">🗑️ Hapus Alat</button>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Script Status Badge Dinamis -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const select = document.getElementById('selectAlat');
            const badge = document.getElementById('statusBadge');

            function updateStatus() {
                const selected = select.options[select.selectedIndex];
                const status = selected.getAttribute('data-status');

                if (status === 'aktif') {
                    badge.className = 'badge bg-success p-2';
                    badge.innerText = '✅ AKTIF';
                } else {
                    badge.className = 'badge bg-danger p-2';
                    badge.innerText = '❌ NONAKTIF';
                }
            }

            select.addEventListener('change', updateStatus);
            updateStatus(); // set default saat load
        });
    </script>

    <!-- Tanaman yang Sudah Disiram Hari Ini -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h4 class="fw-bold mb-3">🌿 Tanaman yang Sudah Disiram Hari Ini</h4>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Tanaman</th>
                            <th>Waktu Penyiraman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($tanaman_diseram)) : ?>
                        <?php $no = 1; foreach ($tanaman_diseram as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->nama_tanaman ?></td>
                                <td><?= date('H:i', strtotime($row->jam_mulai)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted">Tidak ada tanaman yang disiram hari ini.</td>
                        </tr>
                    <?php endif; ?>
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
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Mode</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($jadwal)) : $no = 1; ?>
                        <?php foreach ($jadwal as $row) : ?>
                            <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->hari ?></td>
                            <td><?= $row->jam_mulai ?> - <?= $row->jam_selesai ?></td>
                            <td><?= ucfirst($row->mode) ?></td>
                            <td><?= ucfirst($row->status) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <tr><td colspan="7" class="text-center text-muted">Belum ada data jadwal.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
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
