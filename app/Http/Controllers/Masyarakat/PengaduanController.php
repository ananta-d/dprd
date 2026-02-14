<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    // Simpan Laporan
    public function storeLaporan(Request $request) {
        $path = $request->file('foto') ? $request->file('foto')->store('pengaduan', 'public') : null;

        Complaint::create([
            'nik_masyarakat' => session('nik_warga'),
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $path,
            'status' => 'pending'
        ]);

        // Ubah 'pesan' jadi 'success' agar sesuai dengan toast di tampilan yazid
        return back()->with('success', 'Laporan berhasil terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
