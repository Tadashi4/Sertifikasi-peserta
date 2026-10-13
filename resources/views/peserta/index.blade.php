@extends('layouts.app')

@section('title', 'Data Peserta Sertifikasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Data Peserta Sertifikasi</h3>
    <a href="{{ route('peserta.create') }}" class="btn btn-info">
        <i class="fa-solid fa-user-plus me-1"></i> Tambah Peserta
    </a>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <!-- Form Pencarian -->
        <form action="{{ route('peserta.index') }}" method="GET" class="row g-2">
            <div class="col-md-10">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Kode, Nama, atau No HP..." value="{{ $search }}">
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-success w-100"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
                @if($search)
                    <a href="{{ route('peserta.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-xmark"></i></a>
                @endif
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>Kode Peserta</th>
                        <th>Nama Peserta</th>
                        <th>L/P</th>
                        <th>Skema Sertifikasi</th>
                        <th>No HP</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesertas as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="badge bg-secondary">{{ $item->kd_peserta }}</span></td>
                            <td class="fw-semibold">{{ $item->nm_peserta }}</td>
                            <td>{{ $item->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td><span class="badge bg-info text-dark">{{ $item->skema->nm_skema ?? '-' }}</span></td>
                            <td>{{ $item->no_hp }}</td>
                            <td class="text-center">
                                <a href="{{ route('peserta.show', $item->id) }}" class="btn btn-primary btn-sm text-white" title="Detail">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('peserta.edit', $item->id) }}" class="btn btn-warning btn-sm text-white" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('peserta.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data peserta ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Data peserta tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection