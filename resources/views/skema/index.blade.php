@extends('layouts.app')

@section('title', 'Data Skema Sertifikasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Data Skema Sertifikasi</h3>
    <a href="{{ route('skema.create') }}" class="btn btn-info">
        <i class="fa-solid fa-plus me-1"></i> Tambah Skema
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="50">No</th>
                        <th>Kode Skema</th>
                        <th>Nama Skema</th>
                        <th>Jenis</th>
                        <th>Jumlah Unit</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skemas as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="badge bg-secondary">{{ $item->kd_skema }}</span></td>
                            <td class="fw-semibold">{{ $item->nm_skema }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>{{ $item->jml_unit }} Unit</td>
                            <td class="text-center">
                                <a href="{{ route('skema.show', $item->id) }}" class="btn btn-primary btn-sm text-white">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('skema.edit', $item->id) }}" class="btn btn-warning btn-sm text-white">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('skema.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus skema ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data skema.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection