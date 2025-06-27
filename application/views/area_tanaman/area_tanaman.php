<?php include(APPPATH . 'views/inc/header.php'); ?>

<div class="main-content">
  <div class="container py-4">

    <!-- Form Tambah Area -->
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">🪴 Tambah Area Tanaman</h5>
        <form action="#" method="post">
          <div class="mb-3">
            <label class="form-label">Nama Area</label>
            <input type="text" name="nama_area" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Pilih Tanaman</label>
            <select name="id_tanaman" class="form-select" required>
              <option value="">-- Pilih Tanaman --</option>
              <option value="1">Lidah Buaya (Sukulen)</option>
              <option value="2">Monstera (Tropical)</option>
              <option value="3">Kaktus Mini (Sukulen)</option>
              <option value="4">Sirih Gading (Indoor)</option>
            </select>
          </div>

          <button class="btn btn-primary">➕ Simpan Area</button>
        </form>
      </div>
    </div>

    <!-- Daftar Area -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">📋 Daftar Area Tanaman</h5>
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Nama Area</th>
                <th>Tanaman</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Area Depan</td>
                <td>Monstera</td>
                <td>
                  <a href="#" class="btn btn-sm btn-danger">🗑 Hapus</a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Rak Tengah</td>
                <td>Kaktus Mini</td>
                <td>
                  <a href="#" class="btn btn-sm btn-danger">🗑 Hapus</a>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Sudut Kamar</td>
                <td>Sirih Gading</td>
                <td>
                  <a href="#" class="btn btn-sm btn-danger">🗑 Hapus</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

<?php include(APPPATH . 'views/inc/footer.php'); ?>
