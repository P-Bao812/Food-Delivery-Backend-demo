<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Database\Factories\UserFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class NguoiDung extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $table = 'nguoi_dungs';
    protected $fillable = [
        'email',
        'password',
        'so_dien_thoai',
        'ho_ten',
        'anh_dai_dien',
        'vai_tro',
        'trang_thai',
    ];
}
