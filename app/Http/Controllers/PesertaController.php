<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    // 1. Tampil Data Peserta + Pencarian
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query data peserta beserta relasi skema
        $pesertas = Peserta::with('skema')
            ->when($search, function ($query, $search) {
                return $query->where('nm_peserta', 'like', "%{$search}%")
                             ->orWhere('kd_peserta', 'like', "%{$search}%")
                             ->orWhere('no_hp', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        return view('peserta.index', compact('pesertas', 'search'));
    }

    // 2. Form Tambah Peserta
    public function create()
    {
        $skemas = Skema::all();
        return view('peserta.create', compact('skemas'));
    }

    // 3. Simpan Data Peserta Baru
    public function store(Request $request)
    {
        $request->validate([
            'id_skema'   => 'required|exists:skema,id',
            'kd_peserta' => 'required|unique:peserta,kd_peserta',
            'nm_peserta' => 'required',
            'jk'         => 'required|in:L,P',
            'alamat'     => 'required',
            'no_hp'      => 'required|digits_between:10,12',
        ], [
            'id_skema.required'   => 'Skema Sertifikasi wajib dipilih!',
            'kd_peserta.required' => 'Kode Peserta wajib diisi!',
            'kd_peserta.unique'   => 'Kode Peserta sudah terdaftar!',
            'nm_peserta.required' => 'Nama Peserta wajib diisi!',
            'jk.required'         => 'Jenis Kelamin wajib dipilih!',
            'alamat.required'     => 'Alamat wajib diisi!',
            'no_hp.required'      => 'Nomor HP wajib diisi!',
            'no_hp.digits_between' => 'Nomor HP harus berupa angka, 10 sampai 12 digit!',
        ]);

        Peserta::create($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data Peserta berhasil ditambahkan!');
    }

    // 4. Detail Data Peserta
    public function show(Peserta $peserta)
    {
        $peserta->load('skema');
        return view('peserta.show', compact('peserta'));
    }

    // 5. Form Edit Peserta
    public function edit(Peserta $peserta)
    {
        $skemas = Skema::all();
        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    // 6. Update Data Peserta
    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'id_skema'   => 'required|exists:skema,id',
            'kd_peserta' => 'required|unique:peserta,kd_peserta,' . $peserta->id,
            'nm_peserta' => 'required',
            'jk'         => 'required|in:L,P',
            'alamat'     => 'required',
            'no_hp'      => 'required|digits_between:10,12',
        ], [
            'id_skema.required'   => 'Skema Sertifikasi wajib dipilih!',
            'kd_peserta.required' => 'Kode Peserta wajib diisi!',
            'kd_peserta.unique'   => 'Kode Peserta sudah digunakan!',
            'nm_peserta.required' => 'Nama Peserta wajib diisi!',
            'jk.required'         => 'Jenis Kelamin wajib dipilih!',
            'alamat.required'     => 'Alamat wajib diisi!',
            'no_hp.required'      => 'Nomor HP wajib diisi!',
            'no_hp.digits_between' => 'Nomor HP harus berupa angka, 10 sampai 12 digit!',
        ]);

        $peserta->update($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data Peserta berhasil diperbarui!');
    }

    // 7. Hapus Data Peserta
    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return redirect()->route('peserta.index')->with('success', 'Data Peserta berhasil dihapus!');
    }
}