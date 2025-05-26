<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
     protected $table = 'notifikasi';

    protected $fillable = [
        'penerima_npm',
        'penerima_niden',
        'judul',
        'pesan',
        'status_dibaca',
        'waktu_dibuat',
    ];

    public $timestamps = false;
}
