<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user'; 

    protected $primaryKey = 'id_user'; // karena kamu pakai id_user, bukan id

    public $timestamps = false; // jika tabel kamu tidak punya created_at dan updated_at

    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];
}
?>