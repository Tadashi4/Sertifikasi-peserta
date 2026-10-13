<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - Sertifikasi JWD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand fw-bold mb-0">SERTIFIKASI PESERTA</span>
    <div class="d-flex align-items-center gap-3">
        <span class="text-white-50">{{ $user->name }}</span>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa-solid fa-right-from-bracket me-1"></i> LOGOUT
            </button>
        </form>
    </div>
</nav>

<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <h3 class="fw-bold">Halo, {{ $user->name }}!</h3>
    <p class="text-muted">Selamat datang di Sistem Pengelolaan Data Peserta Sertifikasi.</p>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card bg-primary text-white shadow-sm">
                <div class="card-body">
                    <div class="small fw-semibold">TOTAL SKEMA SERTIFIKASI</div>
                    <div class="fs-2 fw-bold">{{ $totalSkema }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-success text-white shadow-sm">
                <div class="card-body">
                    <div class="small fw-semibold">TOTAL PESERTA TERDAFTAR</div>
                    <div class="fs-2 fw-bold">{{ $totalPeserta }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header fw-semibold">Profil Saya</div>
        <div class="card-body">
            <table class="table table-borderless mb-0">
                <tr><th style="width: 160px;">Nama</th><td>{{ $user->name }}</td></tr>
                <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                <tr><th>Terdaftar sejak</th><td>{{ $user->created_at->format('d M Y') }}</td></tr>
            </table>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>