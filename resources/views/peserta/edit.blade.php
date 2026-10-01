@extends('layouts.app')

@section('title', 'Edit Peserta Sertifikasi')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold">Edit Peserta Sertifikasi</h3>
</div>

<div class="card border-0 shadow-sm" style="max-width: 700px;">
    <div class="card-body p-4">
        <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_skema" class="form-label">Skema Sertifikasi</label>
                <select name="id_skema" class="form-select @error('id_skema') is-invalid @enderror">
                    <option value="">-- Pilih Skema --</option>
                    @foreach($skemas as $skema)
                        <option value="{{ $skema->id }}" {{ old('id_skema', $peserta->id_skema) == $skema->id ? 'selected' : '' }}>
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
                    <input type="text" name="kd_peserta" class="form-control @error('kd_peserta') is-invalid @enderror" value="{{ old('kd_peserta', $peserta->kd_peserta) }}">
                    @error('kd_peserta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nm_peserta" class="form-label">Nama Peserta</label>
                    <input type="text" name="nm_peserta" class="form-control @error('nm_peserta') is-invalid @enderror" value="{{ old('nm_peserta', $peserta->nm_peserta) }}">
                    @error('nm_peserta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-select @error('jk') is-invalid @enderror">
                        <option value="L" {{ old('jk', $peserta->jk) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jk', $peserta->jk) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="no_hp" class="form-label">No. HP / WhatsApp</label>
                    <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', $peserta->no_hp) }}">
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Lengkap</label>
                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat', $peserta->alamat) }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2 pt-2">
                <button type="submit" class="btn btn-primary">Update Peserta</button>
                <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection