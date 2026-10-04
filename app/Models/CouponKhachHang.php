<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponKhachHang extends Model
{
    protected $table = 'coupon_khach_hangs';
    protected $fillable = [
        'id_khach_hang',
        'id_coupon',
        'so_lan_da_dung',
        'lan_cuoi_su_dung',
        'ngay_tao',
    ];
}
