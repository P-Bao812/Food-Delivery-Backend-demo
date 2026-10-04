<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhuVucGiaoHang extends Model
{
    protected $table = 'khu_vuc_giao_hangs';
    protected $fillable = [
        'id_nha_hang',
        'ten_khu_vuc',
        'phi_giao_hang',
        'khoang_cach_toi_da_km',
        'thoi_gian_du_kien_phut',
        'trang_thai',
    ];
}
