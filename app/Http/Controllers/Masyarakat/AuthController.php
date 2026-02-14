<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        return view('masyarakat.index');
    }

     public function register() {
        return view('masyarakat.register');
    }

    // Proses Cek NIK
    public function cekNik(Request $request) {
        $warga = Masyarakat::where('nik', $request->nik)->first();
        if ($warga) {
            session(['nik_warga' => $warga->nik, 'nama_warga' => $warga->nama]);
            return redirect()->route('masyarakat.dashboard');
        }

        return redirect()->route('masyarakat.register')->with('nik', $request->nik);
    }

        // Simpan Warga Baru
    public function storeRegister(Request $request)
{
    // 1. Validasi semua input dari kedua tabel
    $request->validate([
        'name' => 'required|string|max:255|unique:users',
        'email'    => 'required|string|email|unique:users',
        'password' => 'required|string|min:8',
        'nik'      => 'required|string|size:16|unique:masyarakats',
        'alamat'   => 'required|string',
        'telp'     => 'required|string|max:13',
        'role'     => 'required',
    ]);

    // 2. Mulai Transaksi Database
    DB::beginTransaction();

    try {
        // 3. Simpan ke tabel Users
        $user = User::create([
            'name' => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role, // Default role
        ]);

        // 4. Simpan ke tabel Masayrakats menggunakan ID User yang baru dibuat
        Masyarakat::create([
            'nik'     => $request->nik,
            'alamat'  => $request->alamat,
            'telp'    => $request->telp,
            'user_id' => $user->id, // Ambil ID dari proses sebelumnya
        ]);

        // 5. Jika semua berhasil, simpan permanen
        DB::commit();

        // Opsional: Langsung login setelah daftar
        Auth::login($user);

         Alert::toast('PAnda Berhasil Login', 'success')->autoClose(3000);
        return redirect()->route('masyarakat.dashboard');

    } catch (\Exception $e) {
        // 6. Jika ada yang gagal, batalkan semua perubahan
        DB::rollBack();
        
         return redirect()->back()
    ->withErrors($e->getMessage())
    ->withInput();

    }
}
       

   

    
}
