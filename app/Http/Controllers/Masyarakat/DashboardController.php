<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


public function dashboard()
{
    $masyarakat = Auth::user()->masyarakat;

    $laporan = $masyarakat
                ->complaints()
                ->latest()
                ->get();

    return view('masyarakat.dashboard', compact('laporan'));
}

}