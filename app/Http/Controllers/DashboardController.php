<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use App\Models\Peserta;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah data untuk indikator di dashboard
        $totalSkema = Skema::count();
        $totalPeserta = Peserta::count();

        return view('dashboard', compact('totalSkema', 'totalPeserta'));
    }
}