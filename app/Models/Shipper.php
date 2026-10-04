<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $table = 'shippers';
    protected $fillable = [
        'id_nguoi_dung',
        'bien_so_xe',
        'loai_xe',
        'so_cccd',
        'san_sang_nhan_don',
        'diem_danh_gia_tb',
        'trang_thai',
        'ngay_tao',
    ];
}
