<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
   use HasFactory;
   protected $table = 'dosen_pembimbing';
   protected $primaryKey = 'nidn';
   protected $fillable = [
    'nidn',
    'nama',
    'email',
    'no_telp',
];
public $timestamps = false; 

public function dosen()
{
    return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
}

 public function tugasAkhir()
    {
        return $this->belongsTo(TugasAkhir::class, 'id_ta', 'id_ta');
    }
}
