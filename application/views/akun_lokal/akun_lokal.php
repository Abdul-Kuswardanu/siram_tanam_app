<?php include(APPPATH . 'views/inc/header.php'); ?>

<div class="main-content">
    <h1 class="mb-4">👤 Akses Akun Lokal</h1>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <h4 class="fw-bold mb-3">🔐 Masuk sebagai Tamu</h4>

            <p class="text-muted">Gunakan mode lokal untuk mengakses fitur terbatas tanpa akun.</p>

            <form>
            <div class="mb-3">
                <label for="nama_pengguna" class="form-label fw-bold">Nama Pengguna</label>
                <input type="text" class="form-control" id="nama_pengguna" placeholder="Contoh: Tamu123">
            </div>

            <div class="mb-3">
                <label for="nama_pengguna" class="form-label fw-bold">Nomor HP</label>
                <input type="number" class="form-control" id="nomor_hp" placeholder="Contoh: 08123456789">
            </div>

            <button type="submit" class="btn btn-primary w-100">🚪 Masuk Sebagai Tamu</button>
            </form>

            <hr class="my-4">

            <p class="text-center text-muted mb-2">Ingin pengalaman lebih lengkap?</p>
            <a href="<?= site_url('login') ?>" class="btn btn-outline-secondary w-100">✨ Daftar / Login Akun Lengkap</a>

        </div>
    </div>

<?php include(APPPATH . 'views/inc/footer.php'); ?>
