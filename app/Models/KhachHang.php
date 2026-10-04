<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'khach_hangs';
    protected $fillable = [
        'id_nguoi_dung',
        'ngay_sinh',
        'diem_tich_luy',
        'id_dia_chi_mac_dinh',
        'ngay_tao',
    ];
}
