<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Masyarakat extends Model
{
    protected $table = 'masyarakats';
    protected $fillable = ['nik', 'alamat', 'telp', 'user_id'];

    // Balikan ke tabel users
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Masyarakat bisa punya banyak pengaduan (One-to-Many)
    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class, 'masyarakat_id', 'id');
    }
}
