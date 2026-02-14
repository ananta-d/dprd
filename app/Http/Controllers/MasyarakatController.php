<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan ini jika perlu

class MasyarakatController extends Controller
{


   





    // --- TAMBAHKAN FUNGSI BARU DI BAWAH INI ---

    // Halaman Profile (Agar menu Profile di navigasi tidak error)


    // Logout
    public function logout() {
        session()->forget(['nik_warga', 'nama_warga']);
        return redirect()->route('masyarakat.index');
    }
}
