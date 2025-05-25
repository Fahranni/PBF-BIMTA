<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TugasAkhir extends Model
{
    use HasFactory;
    protected $table = 'tugas_akhir';
    protected $primaryKey = 'id_ta';
    protected $fillable = [
     'id_ta',
     'judul',
     'file_ta',
     'status',
     'npm',
     'file_revisi',
     'tanggal_revisi'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'npm', 'npm');
    }

    public function dosen()
    {

        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');

    }
    
}
