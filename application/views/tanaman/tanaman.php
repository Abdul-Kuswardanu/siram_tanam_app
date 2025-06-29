<?php include(APPPATH . 'views/inc/header.php'); ?>

<div class="main-content">
  <h1 class="mb-4">🌱 Daftar Tanaman</h1>

  <?php if ($this->session->flashdata('success')) : ?>
    <script>
      toastr.success("<?= $this->session->flashdata('success'); ?>");
    </script>
  <?php endif; ?>
  <?php if ($this->session->flashdata('error')) : ?>
    <script>
      toastr.error("<?= $this->session->flashdata('error'); ?>");
    </script>
  <?php endif; ?>

  <!-- Form Tambah Tanaman -->
  <div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
      <h4 class="fw-bold mb-3">➕ Tambah Tanaman</h4>
      <form method="post" action="<?= site_url('tanaman/tambah') ?>">
        <div class="row mb-3">
          <div class="col-md-4">
            <label class="form-label fw-bold">Nama Tanaman</label>
            <input type="text" name="nama_tanaman" class="form-control" placeholder="Contoh: Lidah Buaya" required>
          </div>
          <div class="col-md-4">
            <label class="form-label fw-bold">Jenis</label>
            <input type="text" name="jenis" class="form-control" placeholder="Contoh: Sukulen" required>
          </div>
          <div class="col-md-4">
            <label class="form-label fw-bold">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" placeholder="Contoh: Halaman Depan" required>
          </div>
        </div>
        <button type="submit" class="btn btn-success">🌿 Simpan Tanaman</button>
      </form>
    </div>
  </div>

  <!-- Tabel Data Tanaman -->
  <div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
      <h4 class="fw-bold mb-3">📋 Data Tanaman</h4>
      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="table-light">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis</th>
              <th>Lokasi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($tanaman)) : ?>
              <?php $no = 1; foreach ($tanaman as $row) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row->nama_tanaman ?></td>
                  <td><?= $row->jenis ?></td>
                  <td><?= $row->lokasi ?></td>
                  <td>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row->id_tanaman ?>">🗑️ Hapus</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="5" class="text-center text-muted">Belum ada data tanaman.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- MODAL HAPUS -->
<?php foreach ($tanaman as $row) : ?>
  <div class="modal fade" id="modalHapus<?= $row->id_tanaman ?>" tabindex="-1" aria-labelledby="labelHapus<?= $row->id_tanaman ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="labelHapus<?= $row->id_tanaman ?>">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          Yakin ingin menghapus tanaman <strong><?= $row->nama_tanaman ?></strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">❌ Batal</button>
          <a href="<?= site_url('tanaman/hapus/' . $row->id_tanaman) ?>" class="btn btn-danger">🗑️ Hapus</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php include(APPPATH . 'views/inc/footer.php'); ?>
