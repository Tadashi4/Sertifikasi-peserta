@extends('layouts.app')

@section('title', 'Tambah Peserta Sertifikasi')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold">Tambah Peserta Sertifikasi</h3>
</div>

<div class="card border-0 shadow-sm" style="max-width: 700px;">
    <div class="card-body p-4">
        <form action="{{ route('peserta.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_skema" class="form-label">Skema Sertifikasi</label>
                <select name="id_skema" class="form-select @error('id_skema') is-invalid @enderror">
                    <option value="">-- Pilih Skema --</option>
                    @foreach($skemas as $skema)
                        <option value="{{ $skema->id }}" {{ old('id_skema') == $skema->id ? 'selected' : '' }}>
                            {{ $skema->kd_skema }} - {{ $skema->nm_skema }}
                        </option>
                    @endforeach
                </select>
                @error('id_skema')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kd_peserta" class="form-label">Kode Peserta</label>
                    <input type="text" name="kd_peserta" class="form-control @error('kd_peserta') is-invalid @enderror" value="{{ old('kd_peserta') }}" placeholder="PST-003">
                    @error('kd_peserta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nm_peserta" class="form-label">Nama Peserta</label>
                    <input type="text" name="nm_peserta" class="form-control @error('nm_peserta') is-invalid @enderror" value="{{ old('nm_peserta') }}" placeholder="Nama Lengkap">
                    @error('nm_peserta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-select @error('jk') is-invalid @enderror">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="no_hp" class="form-label">No. HP / WhatsApp</label>
                    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" placeholder="08123456789" maxlength="12" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Lengkap</label>
                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2 pt-2">
                <button type="submit" class="btn btn-primary">Simpan Peserta</button>
                <a href="{{ route('peserta.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection