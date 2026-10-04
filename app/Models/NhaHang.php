<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhaHang extends Model
{
    protected $table = 'nha_hangs';
    protected $fillable = [
        'id_nguoi_dung',
        'ten_nha_hang',
        'mo_ta',
        'dia_chi',
        'vi_do',
        'kinh_do',
        'so_dien_thoai',
        'gio_mo_cua',
        'gio_dong_cua',
        'diem_danh_gia_tb',
        'dang_mo_cua',
        'ty_le_hoan_hang',
    ];
}
