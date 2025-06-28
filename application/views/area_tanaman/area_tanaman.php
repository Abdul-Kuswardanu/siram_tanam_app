<?php include(APPPATH . 'views/inc/header.php'); ?>

<div class="main-content">
  <h1 class="mb-4">🏞️ Daftar Area Tanaman</h1>

  <!-- Notifikasi -->
  <?php if ($this->session->flashdata('success')) : ?>
    <script>toastr.success("<?= $this->session->flashdata('success'); ?>");</script>
  <?php endif; ?>
  <?php if ($this->session->flashdata('error')) : ?>
    <script>toastr.error("<?= $this->session->flashdata('error'); ?>");</script>
  <?php endif; ?>

  <!-- Form Tambah Area -->
  <div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
      <h4 class="fw-bold mb-3">➕ Tambah Area Tanaman</h4>
      <form method="post" action="<?= site_url('areatanaman/tambah') ?>">
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label fw-bold">Nama Area</label>
            <input type="text" name="nama_area" class="form-control" placeholder="Contoh: Area Belakang" required>
          </div>
          <div class="col-md-6">
            <label class="form-label fw-bold">Tanaman</label>
            <select name="id_tanaman" class="form-select" required>
              <option value="" disabled selected>Pilih Tanaman</option>
              <?php foreach ($tanaman as $t) : ?>
                <option value="<?= $t->id_tanaman ?>"><?= $t->nama_tanaman ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-success">🏡 Simpan Area</button>
      </form>
    </div>
  </div>

  <!-- Tabel Data Area -->
  <div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
      <h4 class="fw-bold mb-3">📋 Data Area Tanaman</h4>
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
            <?php if (!empty($area)) : ?>
              <?php $no = 1; foreach ($area as $row) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $row->nama_area ?></td>
                  <td><?= $row->nama_tanaman ?></td>
                  <td>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row->id_area ?>">🗑️ Hapus</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="4" class="text-center text-muted">Belum ada data area tanaman.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- MODAL HAPUS -->
<?php foreach ($area as $row) : ?>
  <div class="modal fade" id="modalHapus<?= $row->id_area ?>" tabindex="-1" aria-labelledby="labelHapus<?= $row->id_area ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="labelHapus<?= $row->id_area ?>">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          Yakin ingin menghapus area <strong><?= $row->nama_area ?></strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">❌ Batal</button>
          <a href="<?= site_url('areatanaman/hapus/' . $row->id_area) ?>" class="btn btn-danger">🗑️ Hapus</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php include(APPPATH . 'views/inc/footer.php'); ?>
