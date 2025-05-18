<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;
   protected $table = 'mahasiswa';
   protected $primaryKey = 'npm';
   protected $fillable = [
    'npm',
    'nama',
    'angkatan',
    'email',
    'no_telp',
];
}
