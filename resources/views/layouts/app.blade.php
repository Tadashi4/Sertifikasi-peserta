<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SERTIFIKASI PESERTA')</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icon CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        .sidebar .nav-link {
            color: #c2c7d0;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #fff;
            background-color: #495057;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-md-3 col-lg-2 px-0 sidebar p-3">
            <h5 class="text-white text-center fw-bold mb-4 border-bottom pb-3">SERTIFIKASI PESERTA</h5>
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if(request()->is('dashboard')) active @endif">
                        <i class="fa-solid fa-gauge me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('skema.index') }}" class="nav-link @if(request()->is('skema*')) active @endif">
                        <i class="fa-solid fa-layer-group me-2"></i> Data Skema
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('peserta.index') }}" class="nav-link @if(request()->is('peserta*')) active @endif">
                        <i class="fa-solid fa-users me-2"></i> Data Peserta
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="col-md-9 col-lg-10 ms-sm-auto px-md-4 py-4">
            <!-- Navbar Header -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow-sm mb-4 px-3 d-flex justify-content-between">
                <span class="navbar-brand mb-0 h1 fs-6">Aplikasi Pengelolaan Data Peserta Sertifikasi</span>
                <div class="d-flex align-items-center gap-3">
                    <span class="fw-semibold text-secondary"><i class="fa-solid fa-user me-1"></i> {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-right-from-bracket me-1"></i> LOGOUT
                        </button>
                    </form>
                </div>
            </nav>

            <!-- Pesan Alert Success / Error -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check-circle me-1"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Content Placeholder -->
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>