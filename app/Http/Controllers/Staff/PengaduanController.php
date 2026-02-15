<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function pending(){
        return view('staff.pengaduan.pending');
    }

    public function ubah_status(){
        
    }

    public function diproses(){
        return view('staff.pengaduan.diproses');
    }

    public function selesai(){
        return view('staff.pengaduan.selesai');
    }

    public function ditolak(){
        return view('staff.pengaduan.ditolak');
    }
}
