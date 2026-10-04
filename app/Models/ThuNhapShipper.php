<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThuNhapShipper extends Model
{
    protected $table = 'thu_nhap_shippers';
    protected $fillable = [
        'id_shipper',
        'id_don_hang',
        'phi_giao_hang',
        'tien_tip',
        'tien_thuong',
        'tong_thu_nhap',
        'trang_thai',
        'ngay_tao',
    ];
}
