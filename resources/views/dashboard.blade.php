@extends('layouts.app')

@section('title', 'Dashboard Administrator')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold">Dashboard</h3>
    <p class="text-muted">Selamat Datang, <strong>{{ Auth::user()->name }}</strong> di Sistem Pengelolaan Sertifikasi.</p>
</div>

<div class="row">
    <!-- Card Total Skema -->
    <div class="col-md-6 mb-3">
        <div class="card border-0 shadow-sm bg-primary text-white p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase mb-1">Total Skema Sertifikasi</h6>
                    <h2 class="fw-bold mb-0">{{ $totalSkema }}</h2>
                </div>
                <div class="fs-1 opacity-50">
                    <i class="fa-solid fa-layer-group"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Peserta -->
    <div class="col-md-6 mb-3">
        <div class="card border-0 shadow-sm bg-success text-white p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-uppercase mb-1">Total Peserta Terdaftar</h6>
                    <h2 class="fw-bold mb-0">{{ $totalPeserta }}</h2>
                </div>
                <div class="fs-1 opacity-50">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection