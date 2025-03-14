<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
   use HasFactory;
   protected $table = 'dosen_pembimbing';
   protected $fillable = [
    'nidn',
    'nama',
    'email',
    'no_telp',
];
}
