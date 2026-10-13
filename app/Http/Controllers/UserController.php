<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user         = Auth::user();
        $totalSkema   = Skema::count();
        $totalPeserta = Peserta::count();
        
        return view('user.dashboard', compact('user', 'totalSkema', 'totalPeserta'));
    }
}
