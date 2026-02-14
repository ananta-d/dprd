<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{

public function storeLaporan(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'isi_laporan' => 'required|string',
        'foto' => 'nullable|image|max:2048',
    ]);

    $path = $request->file('foto')
            ? $request->file('foto')->store('pengaduan', 'public')
            : null;

    $masyarakat = Auth::user()->masyarakat;

    Complaint::create([
        'masyarakat_id' => $masyarakat->id,
        'lokasi_kejadian' => $request->lokasi_kejadian,
        'judul' => $request->judul,
        'isi_laporan' => $request->isi_laporan,
        'foto' => $path,
        'status' => 'pending',
    ]);

    Alert::toast('Pengaduan berhasil dikirim.', 'success')->autoClose(3000);

    return back();
}
}
