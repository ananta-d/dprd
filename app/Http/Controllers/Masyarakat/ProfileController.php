<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile() {
        $user = Masyarakat::where('nik', session('nik_warga'))->first();
        return view('masyarakat.profile', compact('user'));
    }

    // Update Profile
    public function updateProfile(Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telp' => 'required',
        ]);

        Masyarakat::where('nik', session('nik_warga'))->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telp' => $request->telp,
        ]);

        // Update session nama kalau berubah
        session(['nama_warga' => $request->nama]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
