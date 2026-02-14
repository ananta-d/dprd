<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {

        $laporan = Complaint::where('nik_masyarakat', session('nik_warga'))
                            ->orderBy('created_at', 'desc')
                            ->get();
        return view('masyarakat.dashboard', compact('laporan'));
    }
}
