<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaChiKhachHang extends Model
{
    protected $table = 'dia_chi_khach_hangs';
    protected $fillable = [
        'id_khach_hang',
        'ten_dia_chi',
        'dia_chi',
        'vi_do',
        'kinh_do',
        'so_dien_thoai'
    ];
}
