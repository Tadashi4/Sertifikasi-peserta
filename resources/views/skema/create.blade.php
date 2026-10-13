@extends('layouts.app')

@section('title', 'Tambah Skema Sertifikasi')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold">Tambah Skema Sertifikasi</h3>
</div>

<div class="card border-0 shadow-sm" style="max-width: 600px;">
    <div class="card-body p-4">
        <form action="{{ route('skema.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kd_skema" class="form-label">Kode Skema</label>
                <input type="text" name="kd_skema" class="form-control @error('kd_skema') is-invalid @enderror" value="{{ old('kd_skema') }}" placeholder="Contoh: SKM-003">
                @error('kd_skema')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nm_skema" class="form-label">Nama Skema</label>
                <input type="text" name="nm_skema" class="form-control @error('nm_skema') is-invalid @enderror" value="{{ old('nm_skema') }}" placeholder="Contoh: Web Developer">
                @error('nm_skema')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Skema</label>
                <select name="jenis" class="form-select @error('jenis') is-invalid @enderror">
                    <option value="">-- Pilih Jenis --</option>
                    <option value="KKNI Level 4" {{ old('jenis') == 'KKNI Level 4' ? 'selected' : '' }}>KKNI Level 4</option>
                    <option value="Okupasi" {{ old('jenis') == 'Okupasi' ? 'selected' : '' }}>Okupasi</option>
                    <option value="Klaster" {{ old('jenis') == 'Klaster' ? 'selected' : '' }}>Klaster</option>
                </select>
                @error('jenis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jml_unit" class="form-label">Jumlah Unit</label>
                <input type="number" name="jml_unit" class="form-control @error('jml_unit') is-invalid @enderror" value="{{ old('jml_unit') }}" placeholder="Contoh: 6">
                @error('jml_unit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2 pt-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('skema.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection