<?php include(APPPATH . 'views/inc/header_auth.php'); ?>

<div class="main-content d-flex justify-content-center align-items-center" style="min-height: 85vh;">
  <div class="card shadow-sm border-0" style="width: 100%; max-width: 500px;">
    <div class="card-body">
      <h3 class="text-center fw-bold mb-4">📝 Daftar Akun Baru</h3>
      <form method="post" action="<?= site_url('auth/daftar'); ?>">
        <div class="mb-3">
          <label for="nama_pengguna" class="form-label fw-bold">Nama Pengguna</label>
          <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Contoh: BudiSantoso" required>
        </div>
        <div class="mb-3">
          <label for="no_hp" class="form-label fw-bold">Nomor HP</label>
          <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Contoh: 08123456789" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label fw-bold">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Contoh: user@email.com" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label fw-bold">Password</label>
          <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            <button class="btn btn-outline-secondary toggle-password" type="button">👁️</button>
          </div>
        </div>
        <button type="submit" class="btn btn-success w-100 mt-3">✅ Daftar Sekarang</button>
      </form>

      <p class="mt-4 text-center text-muted">Sudah punya akun? <a href="<?= site_url('SmartSiram/login') ?>">Login di sini</a></p>
      <hr class="my-4">
      <a href="<?= site_url('akun_lokal'); ?>" class="btn btn-outline-secondary w-100">🔙 Kembali ke Akun Lokal</a>
    </div>
  </div>
</div>

<script>
  document.querySelector('.toggle-password').addEventListener('click', function () {
    const input = document.getElementById('password');
    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';
    this.textContent = isPassword ? '🙈' : '👁️';
  });
</script>

<?php include(APPPATH . 'views/inc/footer_auth.php'); ?>
