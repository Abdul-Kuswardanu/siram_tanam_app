<?php include(APPPATH . 'views/inc/header.php'); ?>

<div class="main-content">
  <div class="container py-4">

    <!-- Card Form Input -->
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">🌿 Tambah Tanaman Baru</h5>
        <form action="<?= site_url('SmartSiram/tambah_tanaman') ?>" method="post">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Nama Tanaman</label>
              <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Jenis</label>
              <input type="text" name="jenis" class="form-control">
            </div>
          </div>
          <button class="btn btn-success">➕ Simpan Tanaman</button>
        </form>
      </div>
    </div>

    <!-- Card Daftar Tanaman -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">📋 Daftar Tanaman</h5>
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- Contoh -->
              <tr>
                <td>1</td>
                <td>Lidah Buaya</td>
                <td>Sukulen</td>
                <td>
                  <a href="<?= site_url('SmartSiram/hapus_tanaman/1') ?>" class="btn btn-sm btn-danger">🗑 Hapus</a>
                </td>
              </tr>
              <!-- Loop data asli -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

<?php include(APPPATH . 'views/inc/footer.php'); ?>
