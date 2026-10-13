<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Sertifikasi JWD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        .welcome-icon {
            font-size: 3rem;
            color: #0d6efd;
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

        @auth
            <a href="{{ route('dashboard') }}" class="btn btn-primary w-100 py-2 fw-semibold">
                <i class="fa-solid fa-gauge me-1"></i> Ke Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary w-100 py-2 fw-semibold">
                <i class="fa-solid fa-right-to-bracket me-1"></i> Masuk sebagai Admin
            </a>
        @endauth

        <small class="text-muted mt-4 d-block">&copy; {{ date('Y') }} Sistem Sertifikasi Peserta</small>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>