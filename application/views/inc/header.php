<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Smart Siram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
            html, body {
                height: 100%;
                margin: 0;
            }

            body {
                display: flex;
                flex-direction: row;
            }

            .sidebar {
                width: 220px;
                background-color: #198754;
                padding: 20px;
                color: white;
            }

            .sidebar a {
                display: block;
                padding: 10px;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }

            .sidebar a:hover {
                background-color: #157347;
            }

            .container {
                flex-grow: 1;
                display: flex;
                flex-direction: column;
            }

            .content {
                flex: 1;
                padding: 20px;
                background-color: #f8f9fa;
            }

            /* Bikin layout flex horizontal */
            body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            }

            /* Sidebar tetap (sticky kiri) */
            #sidebar {
            width: 220px;
            background-color: #198754; /* hijau */
            min-height: 100vh;
            position: sticky;
            top: 0;
            flex-shrink: 0;
            color: white;
            }

            /* Konten utama scrollable */
            .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background-color: #f8f9fa; /* warna abu-abu terang */
            }

        </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4>🌿 Smart Siram</h4>
    <hr style="border-color: rgba(255,255,255,0.3)">
    <a href="<?= site_url('dashboard') ?>">🏠 Dashboard</a>
    <a href="<?= site_url('sistem-waktu') ?>">⏰ Sistem Waktu</a>
    <a href="<?= site_url('tanaman') ?>">🌱 Tanaman</a>
    <a href="<?= site_url('area_tanaman') ?>">🌾 Area Tanaman</a>
    <a href="<?= site_url('akun_lokal') ?>">👤 Akun Lokal</a>
</div>

<!-- Container untuk content + footer -->
<div class="main-content">
    <div class="container">
        <div class="content">
