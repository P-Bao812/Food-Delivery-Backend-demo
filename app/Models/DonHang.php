<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'don_hangs';
    protected $fillable = [
        'id_khach_hang',
        'id_nha_hang',
        'id_shipper',
        'id_dia_chi',
        'id_khu_vuc_giao_hang',
        'id_coupon',
        'trang_thai',
        'tong_tien_hang',
        'phi_giao_hang',
        'tien_giam_gia',
        'tong_thanh_toan',
        'ghi_chu',
        'thoi_gian_du_kien_giao',
        'thoi_gian_dat',
        'thoi_gian_xac_nhan',
        'thoi_gian_giao_hang',
        'phuong_thuc_thanh_toan',
        'ma_hoa_don',
    ];
}
