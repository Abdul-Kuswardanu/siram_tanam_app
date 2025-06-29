<?php include(APPPATH . 'views/inc/header_auth.php'); ?>

<div class="main-content d-flex justify-content-center align-items-center" style="min-height: 85vh;">
  <div class="card shadow-sm border-0" style="width: 100%; max-width: 480px;">
    <div class="card-body text-center">
      <h2 class="fw-bold mb-4 text-danger">⏳ Masa Trial Habis!</h2>
      <p class="mb-4">
        Masa percobaan akun lokal kamu sudah <span class="fw-bold">berakhir</span>.<br>
        Untuk lanjut menggunakan Smart Siram, silakan <b>daftar akun baru</b> atau <b>login</b> jika sudah punya akun.
      </p>
      <a href="<?= site_url('auth/daftar') ?>" class="btn btn-success w-100 mb-2">📝 Daftar Akun</a>
      <a href="<?= site_url('auth/login') ?>" class="btn btn-primary w-100">🔐 Login</a>
      <hr class="my-3">
      <a href="<?= site_url('akun_lokal') ?>" class="btn btn-outline-secondary w-100">🔙 Kembali ke Akun Lokal</a>
    </div>
  </div>
</div>

<?php include(APPPATH . 'views/inc/footer_auth.php'); ?>
