@extends('layouts.app')

@section('title', 'Detail Peserta Sertifikasi')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold">Detail Peserta Sertifikasi</h3>
</div>

<div class="card border-0 shadow-sm" style="max-width: 600px;">
    <div class="card-body p-4">
        <table class="table table-borderless align-middle mb-4">
            <tr>
                <th width="160" class="text-muted">Kode Peserta</th>
                <td>: <span class="badge bg-secondary fs-6">{{ $peserta->kd_peserta }}</span></td>
            </tr>
            <tr>
                <th class="text-muted">Nama Peserta</th>
                <td class="fw-bold fs-5">: {{ $peserta->nm_peserta }}</td>
            </tr>
            <tr>
                <th class="text-muted">Jenis Kelamin</th>
                <td>: {{ $peserta->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <th class="text-muted">No. HP / WA</th>
                <td>: {{ $peserta->no_hp }}</td>
            </tr>
            <tr>
                <th class="text-muted">Alamat</th>
                <td>: {{ $peserta->alamat }}</td>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
            <tr>
                <th class="text-muted">Skema Sertifikasi</th>
                <td>: <span class="badge bg-info text-dark fs-6">{{ $peserta->skema->nm_skema ?? '-' }}</span></td>
            </tr>
            <tr>
                <th class="text-muted">Kode Skema</th>
                <td>: {{ $peserta->skema->kd_skema ?? '-' }}</td>
            </tr>
            <tr>
                <th class="text-muted">Jenis Skema</th>
                <td>: {{ $peserta->skema->jenis ?? '-' }}</td>
            </tr>
        </table>

        <a href="{{ route('peserta.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left me-1"></i> Kembali</a>
    </div>
</div>
@endsection