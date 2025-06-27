<?php include(APPPATH . 'views/inc/header.php'); ?>

<div class="main-content">
  <div class="container py-4">

    <!-- CARD: Form Tambah Jadwal -->
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">⏰ Tambah Jadwal Penyiraman</h5>
        <form action="#" method="post">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Jam Mulai</label>
              <input type="time" name="jam_mulai" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Jam Selesai</label>
              <input type="time" name="jam_selesai" class="form-control" required>
            </div>
          </div>

          <!-- Golongan & Target -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Golongan</label>
              <select id="golonganSelect" name="golongan" class="form-select" required>
                <option value="tanaman">Tanaman</option>
                <option value="area">Area</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Target</label>
              <select id="targetSelect" name="target_id" class="form-select" required>
                <option value="">-- Pilih --</option>
                <!-- Tanaman -->
                <option class="opt-tanaman" value="1">Lidah Buaya</option>
                <option class="opt-tanaman" value="2">Monstera</option>
                <option class="opt-tanaman" value="3">Sirih Gading</option>
                <!-- Area -->
                <option class="opt-area d-none" value="a1">Area Depan</option>
                <option class="opt-area d-none" value="a2">Rak Tengah</option>
              </select>
            </div>
          </div>

          <!-- Mode & Status -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label">Mode</label>
              <select name="mode" class="form-select" required>
                <option value="otomatis">Otomatis</option>
                <option value="manual">Manual</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Status</label>
              <select name="status" class="form-select" required>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
              </select>
            </div>
          </div>

          <button class="btn btn-success">➕ Simpan Jadwal</button>
        </form>
      </div>
    </div>

    <!-- CARD: Tabel Jadwal -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">📅 Jadwal Tersimpan</h5>
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Jam</th>
                <th>Golongan</th>
                <th>Target</th>
                <th>Mode</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>07:00 - 09:00</td>
                <td>Tanaman</td>
                <td>(tanaman Lidah Buaya)</td>
                <td>Otomatis</td>
                <td>Aktif</td>
                <td>
                  <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">✏️ Edit</button>
                  <a href="#" class="btn btn-sm btn-danger">🗑 Hapus</a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>16:00 - 17:00</td>
                <td>Area</td>
                <td>(area tanaman Rak Tengah)</td>
                <td>Manual</td>
                <td>Nonaktif</td>
                <td>
                  <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">✏️ Edit</button>
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

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form action="#" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Penyiraman</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_jadwal" value="1">
          <div class="mb-3">
            <label class="form-label">Mode</label>
            <select name="mode" class="form-select">
              <option value="otomatis">Otomatis</option>
              <option value="manual">Manual</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="aktif">Aktif</option>
              <option value="nonaktif">Nonaktif</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Script: Filter Target -->
<script>
  const golongan = document.getElementById('golonganSelect');
  const target = document.getElementById('targetSelect');
  const opsiTanaman = document.querySelectorAll('.opt-tanaman');
  const opsiArea = document.querySelectorAll('.opt-area');

  function filterTarget() {
    if (golongan.value === 'tanaman') {
      opsiTanaman.forEach(opt => opt.classList.remove('d-none'));
      opsiArea.forEach(opt => opt.classList.add('d-none'));
    } else {
      opsiTanaman.forEach(opt => opt.classList.add('d-none'));
      opsiArea.forEach(opt => opt.classList.remove('d-none'));
    }
    target.value = ''; // reset pilihan
  }

  golongan.addEventListener('change', filterTarget);
  window.addEventListener('DOMContentLoaded', filterTarget);
</script>

<?php include(APPPATH . 'views/inc/footer.php'); ?>
