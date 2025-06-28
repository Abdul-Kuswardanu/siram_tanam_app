<?php include(APPPATH . 'views/inc/header.php'); ?>

<div class="main-content">
    <h1 class="mb-4">🏠 Dashboard Smart Siram</h1>

    <!-- Status Alat -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h4 class="fw-bold mb-3">🔌 Status Alat</h4>
            <p class="mb-3">Alat Saat Ini: <span class="badge bg-success">AKTIF</span></p>
            <button class="btn btn-danger me-2">❌ Matikan Alat</button>
            <button class="btn btn-success">✅ Nyalakan Alat</button>
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
