<?php include(APPPATH . 'views/inc/header.php'); ?>

<div class="main-content">
  <h1 class="mb-4">⏰ Sistem Waktu Penyiraman</h1>

  <?php if ($this->session->flashdata('success')) : ?>
    <script>toastr.success("<?= $this->session->flashdata('success') ?>");</script>
  <?php endif; ?>
  <?php if ($this->session->flashdata('error')) : ?>
    <script>toastr.error("<?= $this->session->flashdata('error') ?>");</script>
  <?php endif; ?>

  <!-- Form Tambah Jadwal -->
  <div class="card mb-4 shadow-sm border-0">
    <div class="card-body">
      <h4 class="fw-bold mb-3">➕ Tambah Jadwal Penyiraman</h4>
      <form method="post" action="<?= site_url('sistemwaktu/tambah') ?>">
        <div class="row mb-3">
          <div class="col-md-2">
            <label class="form-label fw-bold">Golongan</label>
            <select name="golongan" id="golonganSelect" class="form-select" required>
              <option value="" disabled selected>Pilih Golongan</option>
              <option value="tanaman">Tanaman</option>
              <option value="area">Area</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label fw-bold">Target</label>
            <select name="target_id" id="targetSelect" class="form-select" required>
              <option value="" disabled selected>Pilih Target</option>
              <?php foreach ($tanaman as $t) : ?>
                <option class="opt-tanaman" value="<?= $t->id_tanaman ?>"><?= $t->nama_tanaman ?></option>
              <?php endforeach; ?>
              <?php foreach ($area as $a) : ?>
                <option class="opt-area" value="<?= $a->id_area ?>"><?= $a->nama_area ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-2">
            <label class="form-label fw-bold">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" required>
          </div>
          <div class="col-md-2">
            <label class="form-label fw-bold">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label class="form-label fw-bold">Hari</label>
            <input type="text" name="hari" class="form-control" placeholder="Senin / Setiap Hari" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-3">
            <label class="form-label fw-bold">Mode</label>
            <select name="mode" class="form-select" required>
              <option value="otomatis">Otomatis</option>
              <option value="manual">Manual</option>
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label fw-bold">Status</label>
            <select name="status" class="form-select" required>
              <option value="aktif">Aktif</option>
              <option value="nonaktif">Nonaktif</option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-success">💾 Simpan Jadwal</button>
      </form>
    </div>
  </div>

  <!-- Tabel Jadwal Penyiraman -->
  <div class="card shadow-sm border-0">
    <div class="card-body">
      <h4 class="fw-bold mb-3">📋 Daftar Jadwal Penyiraman</h4>
      <div class="table-responsive">
        <table class="table table-bordered align-middle">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Target</th>
              <th>Hari</th>
              <th>Jam</th>
              <th>Mode</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($jadwal)) : $no = 1; ?>
              <?php foreach ($jadwal as $row) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td>
                    <?php
                      if ($row->golongan == 'tanaman') {
                        foreach ($tanaman as $t) {
                          if ($t->id_tanaman == $row->target_id) echo "Tanaman - $t->nama_tanaman";
                        }
                      } else {
                        foreach ($area as $a) {
                          if ($a->id_area == $row->target_id) echo "Area - $a->nama_area";
                        }
                      }
                    ?>
                  </td>
                  <td><?= $row->hari ?></td>
                  <td><?= $row->jam_mulai ?> - <?= $row->jam_selesai ?></td>
                  <td><?= ucfirst($row->mode) ?></td>
                  <td><?= ucfirst($row->status) ?></td>
                  <td>
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row->id_jadwal ?>">✏️</button>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row->id_jadwal ?>">🗑️</button>
                  </td>
                </tr>

                <!-- MODAL EDIT -->
                <div class="modal fade" id="modalEdit<?= $row->id_jadwal ?>" tabindex="-1">
                  <div class="modal-dialog">
                    <form method="post" action="<?= site_url('sistemwaktu/edit/' . $row->id_jadwal) ?>">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Mode & Status</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                            <label class="form-label">Mode</label>
                            <select name="mode" class="form-select">
                              <option value="otomatis" <?= $row->mode == 'otomatis' ? 'selected' : '' ?>>Otomatis</option>
                              <option value="manual" <?= $row->mode == 'manual' ? 'selected' : '' ?>>Manual</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                              <option value="aktif" <?= $row->status == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                              <option value="nonaktif" <?= $row->status == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">💾 Simpan</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">❌ Batal</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <!-- MODAL HAPUS -->
                <div class="modal fade" id="modalHapus<?= $row->id_jadwal ?>" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        Yakin ingin menghapus jadwal pada <strong><?= $row->hari ?></strong> pukul <strong><?= $row->jam_mulai ?> - <?= $row->jam_selesai ?></strong>?
                      </div>
                      <div class="modal-footer">
                        <a href="<?= site_url('sistemwaktu/hapus/' . $row->id_jadwal) ?>" class="btn btn-danger">🗑️ Hapus</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">❌ Batal</button>
                      </div>
                    </div>
                  </div>
                </div>
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

<!-- Script filter golongan -->
<script>
  const golonganSelect = document.getElementById('golonganSelect');
  const targetSelect = document.getElementById('targetSelect');

  function filterTarget() {
    const selectedGolongan = golonganSelect.value;
    const options = targetSelect.querySelectorAll('option');

    options.forEach(opt => {
      if (opt.value === '') return;
      const isTanaman = opt.classList.contains('opt-tanaman');
      const isArea = opt.classList.contains('opt-area');
      if ((selectedGolongan === 'tanaman' && isTanaman) || (selectedGolongan === 'area' && isArea)) {
        opt.style.display = 'block';
      } else {
        opt.style.display = 'none';
      }
    });

    targetSelect.value = '';
  }

  golonganSelect.addEventListener('change', filterTarget);
  document.addEventListener('DOMContentLoaded', filterTarget);
</script>

<?php include(APPPATH . 'views/inc/footer.php'); ?>
