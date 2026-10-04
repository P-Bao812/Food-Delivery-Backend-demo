<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuanTriVien extends Model
{
    protected $table = 'quan_tri_viens';
    protected $fillable = [
        'id_nguoi_dung',
        'phong_ban',
        'ngay_tao',
    ];
}
