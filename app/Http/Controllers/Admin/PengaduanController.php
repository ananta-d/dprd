<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function pending(){
        return view('admin.pengaduan.pending');
    }

    public function ubah_status(){
        
    }

    public function diproses(){
        return view('admin.pengaduan.diproses');
    }

    public function selesai(){
        return view('admin.pengaduan.selesai');
    }

    public function ditolak(){
        return view('admin.pengaduan.ditolak');
    }
}
