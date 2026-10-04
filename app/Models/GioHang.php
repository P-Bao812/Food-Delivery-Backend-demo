<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    protected $table = 'gio_hangs';

    protected $fillable = [
        'id_mon_an',
        'id_nha_hang',
        'id_danh_muc',
        'ten_mon_an',
        'mo_ta',
        'hinh_anh',
        'gia_ban',
        'gia_goc',
        'thoi_gian_chuan_bi_phut',
        'trang_thai',
    ];
}
