<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    protected $table = 'khuyen_mais';
    protected $fillable = [
        'id_nha_hang',
        'ten_khuyen_mai',
        'mo_ta',
        'kieu_giam',
        'so_tien_giam',
        'dieu_kien_toi_thieu',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'trang_thai',
    ];
}
