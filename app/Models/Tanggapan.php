<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tanggapan extends Model
{
    protected $table = 'tanggapans';
    protected $fillable = [
        'tanggapan', 'tgl_tanggapan', 'dokumenrasi', 'complaint_id'
    ];

    // Tanggapan ini merujuk ke laporan yang mana?
    public function complaint(): BelongsTo
    {
        return $this->belongsTo(Complaint::class, 'complaint_id', 'id');
    }
}
