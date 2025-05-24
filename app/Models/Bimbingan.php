<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bimbingan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_bimbingan'; 

    protected $primaryKey = 'id_jadwal'; // primary key jika bukan 'id'

    public $timestamps = false; 

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }
    
    public function mahasiswa()
    {
        
        return $this->belongsTo(Mahasiswa::class, 'npm', 'npm');
    }
    protected $fillable = [
        'id_jadwal',
        'id_ta',
        'nidn',
        'tanggal_bimbingan',
        'catatan_bimbingan',
        'status',
    ];
}
