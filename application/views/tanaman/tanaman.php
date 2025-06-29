<?php include(APPPATH . 'views/inc/header.php'); ?>

<div class="main-content">
    <h1 class="mb-4">🌱 Data Tanaman</h1>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <!-- Countdown masa trial akun lokal (guest) -->
    <?php if ($this->session->userdata('is_guest') && isset($sisa_detik)): ?>
      <div class="text-center mb-4">
        <h5 class="fw-bold">⏳ Masa trial akun lokal:</h5>
        <div id="countdown" class="fs-4 text-danger"></div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        let sisa = <?= $sisa_detik ?>;
        function pad(n) {return n<10?'0'+n:n}
        function updateCountdown() {
          if (sisa <= 0) {
            document.getElementById('countdown').innerHTML = "Trial habis!";
            setTimeout(function(){ location.href = "<?= site_url('auth/daftar') ?>"; }, 2000);
            return;
          }
          let d = Math.floor(sisa/86400), h = Math.floor((sisa%86400)/3600), m = Math.floor((sisa%3600)/60), s2 = sisa%60;
          document.getElementById('countdown').innerHTML = `${pad(d)} hari ${pad(h)}:${pad(m)}:${pad(s2)}`;
          if (sisa === 1800) {
            if (typeof Swal !== "undefined") {
              Swal.fire({
                icon: 'warning',
                title: '⏰ Waktu akun lokal tinggal 30 menit!',
                text: 'Segera daftar akun untuk akses penuh dashboard.',
                timer: 8000,
                timerProgressBar: true,
                showConfirmButton: false
              });
            } else {
              alert("⏰ Waktu akun lokal tinggal 30 menit lagi! Segera daftar akun untuk akses penuh.");
            }
          }
          sisa--;
          setTimeout(updateCountdown, 1000);
        }
        updateCountdown();
      </script>
    <?php endif; ?>

    <!-- Tombol tambah hanya untuk user registered -->
    <?php if (!$this->session->userdata('is_guest')): ?>
        <a href="<?= site_url('tanaman/tambah') ?>" class="btn btn-primary mb-3">➕ Tambah Tanaman</a>
    <?php else: ?>
        <div class="alert alert-warning mb-3">
            Fitur tambah/edit/hapus hanya untuk pengguna yang sudah daftar akun.<br>
            <a href="<?= site_url('auth/daftar') ?>" class="btn btn-sm btn-success mt-2">Daftar Sekarang</a>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Tanaman</th>
                            <th>Jenis</th>
                            <th>Lokasi</th>
                            <?php if (!$this->session->userdata('is_guest')): ?>
                                <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($tanaman as $t): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $t->nama_tanaman ?></td>
                            <td><?= $t->jenis ?></td>
                            <td><?= $t->lokasi ?></td>
                            <?php if (!$this->session->userdata('is_guest')): ?>
                            <td>
                                <a href="<?= site_url('tanaman/edit/'.$t->id_tanaman) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= site_url('tanaman/hapus/'.$t->id_tanaman) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($tanaman)): ?>
                        <tr>
                            <td colspan="<?= $this->session->userdata('is_guest') ? 4 : 5 ?>" class="text-center text-muted">Belum ada data tanaman.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include(APPPATH . 'views/inc/footer.php'); ?>