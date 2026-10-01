<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    // 1. Tampil Data Skema
    public function index()
    {
        $skemas = Skema::latest()->get();
        return view('skema.index', compact('skemas'));
    }

    // 2. Form Tambah Skema
    public function create()
    {
        return view('skema.create');
    }

    // 3. Simpan Data Skema Baru
    public function store(Request $request)
    {
        $request->validate([
            'kd_skema' => 'required|unique:skema,kd_skema',
            'nm_skema' => 'required',
            'jenis'    => 'required',
            'jml_unit' => 'required|numeric|min:1',
        ], [
            'kd_skema.required' => 'Kode Skema wajib diisi!',
            'kd_skema.unique'   => 'Kode Skema sudah ada!',
            'nm_skema.required' => 'Nama Skema wajib diisi!',
            'jenis.required'    => 'Jenis Skema wajib dipilih!',
            'jml_unit.required' => 'Jumlah Unit wajib diisi!',
        ]);

        Skema::create($request->all());

        return redirect()->route('skema.index')->with('success', 'Data Skema berhasil ditambahkan!');
    }

    // 4. Form Edit Skema
    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    // 5. Update Data Skema
    public function update(Request $request, Skema $skema)
    {
        $request->validate([
            'kd_skema' => 'required|unique:skema,kd_skema,' . $skema->id,
            'nm_skema' => 'required',
            'jenis'    => 'required',
            'jml_unit' => 'required|numeric|min:1',
        ], [
            'kd_skema.required' => 'Kode Skema wajib diisi!',
            'kd_skema.unique'   => 'Kode Skema sudah digunakan!',
            'nm_skema.required' => 'Nama Skema wajib diisi!',
            'jenis.required'    => 'Jenis Skema wajib dipilih!',
            'jml_unit.required' => 'Jumlah Unit wajib diisi!',
        ]);

        $skema->update($request->all());

        return redirect()->route('skema.index')->with('success', 'Data Skema berhasil diperbarui!');
    }

    // 6. Hapus Data Skema
    public function destroy(Skema $skema)
    {
        $skema->delete();
        return redirect()->route('skema.index')->with('success', 'Data Skema berhasil dihapus!');
    }
}