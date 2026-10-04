<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    protected $table = 'chi_tiet_don_hangs';
    protected $fillable = [
        'id_don_hang',
        'id_mon_an',
        'ten_mon_an_luu_tru',
        'gia_luu_tru',
        'so_luong',
        'ghi_chu',
        'thanh_tien',
    ];
}
