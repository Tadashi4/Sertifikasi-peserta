<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Sertifikasi JWD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .welcome-card {
            max-width: 520px;
            margin: 100px auto;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card welcome-card p-4 p-md-5 text-center">
        <h4 class="fw-bold mb-1">SELAMAT DATANG</h4>
        <p class="text-muted mb-3">Aplikasi Pengelolaan Data Peserta Sertifikasi</p>

        <hr>

        <p class="text-secondary small mb-4">
            Kelola data skema dan peserta sertifikasi dengan mudah dalam satu tempat.
        </p>

        <a href="{{ route('login') }}" class="btn btn-primary w-100 py-2 fw-semibold mb-2">
            Masuk
        </a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary w-100 py-2 fw-semibold">
            Daftar Akun
        </a>
        <a href="{{ route('admin.login') }}" class="small text-muted d-block mt-3">Login sebagai Admin</a>
        <small class="text-muted mt-4 d-block">&copy; {{ date('Y') }} Sistem Sertifikasi Peserta</small>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>