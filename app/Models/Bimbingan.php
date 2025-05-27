<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bimbingan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_bimbingan'; 

    protected $primaryKey = 'id_jadwal'; 

    public $timestamps = false; // ganti ke true kalau pakai created_at dan updated_at

    protected $fillable = [
        'id_ta',
        'nidn',
        'tanggal_bimbingan',
        'catatan_bimbingan',
        'status',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }

    public function mahasiswa()
    {
        
        return $this->belongsTo(Mahasiswa::class, 'npm', 'npm');
    }
}
