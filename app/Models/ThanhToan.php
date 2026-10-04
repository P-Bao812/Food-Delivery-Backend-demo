<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    protected $table = 'thanh_toans';
    protected $fillable = [
        'id_don_hang',
        'phuong_thuc',
        'so_tien',
        'ma_giao_dich',
        'trang_thai',
        'thoi_gian_thanh_toan',
        'phan_hoi_cong',
    ];
}
