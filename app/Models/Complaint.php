<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Complaint extends Model
{
    protected $fillable = [
        'judul', 'isi_laporan', 'foto', 'lokasi_kejadian', 'status', 'masyarakat_id'
    ];

    // Laporan ini milik siapa?
    public function masyarakat(): BelongsTo
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id', 'id');
    }

    // Satu laporan bisa punya banyak tanggapan (atau satu, tergantung logika bisnis)
    public function tanggapans(): HasMany
    {
        return $this->hasMany(Tanggapan::class, 'complaint_id', 'id');
    }
}
