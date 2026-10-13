@extends('layouts.app')

@section('title', 'Detail Skema Sertifikasi')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold">Detail Skema Sertifikasi</h3>
</div>

<div class="card border-0 shadow-sm" style="max-width: 700px;">
    <div class="card-body p-4">
        <table class="table table-borderless align-middle mb-4">
            <tr>
                <th width="160" class="text-muted">Kode Skema</th>
                <td>: <span class="badge bg-secondary fs-6">{{ $skema->kd_skema }}</span></td>
            </tr>
            <tr>
                <th class="text-muted">Nama Skema</th>
                <td class="fw-bold fs-5">: {{ $skema->nm_skema }}</td>
            </tr>
            <tr>
                <th class="text-muted">Jenis</th>
                <td>: {{ $skema->jenis }}</td>
            </tr>
            <tr>
                <th class="text-muted">Jumlah Unit</th>
                <td>: {{ $skema->jml_unit }} Unit</td>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
            <tr>
                <th class="text-muted">Jumlah Peserta</th>
                <td>: <span class="badge bg-info text-dark fs-6">{{ $skema->peserta->count() }} Peserta</span></td>
            </tr>
        </table>

        <h6 class="fw-bold mb-3">Daftar Peserta pada Skema Ini</h6>
        <div class="table-responsive mb-4">
            <table class="table table-sm table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Kode</th>
                        <th>Nama Peserta</th>
                        <th>L/P</th>
                        <th>No HP</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skema->peserta as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="badge bg-secondary">{{ $p->kd_peserta }}</span></td>
                            <td>{{ $p->nm_peserta }}</td>
                            <td>{{ $p->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $p->no_hp }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada peserta pada skema ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('skema.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>
@endsection