<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = 'danh_gias';

    protected $fillable = [
        'id_don_hang',
        'id_khach_hang',
        'id_nha_hang',
        'id_shipper',
        'diem_do_an',
        'diem_shipper',
        'diem_ung_dung',
        'nhan_xet_do_an',
        'nhan_xet_shipper',
        'anh_danh_gia',
        'trang_thai',
    ];
}
