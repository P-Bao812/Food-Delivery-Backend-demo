<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaGiamGia extends Model
{
    protected $table = 'ma_giam_gias';
    protected $fillable = [
        'id_nha_hang',
        'ma_code',
        'mo_ta',
        'loai_giam_gia',
        'gia_tri_giam',
        'gia_tri_don_toi_thieu',
        'giam_toi_da',
        'gioi_han_su_dung',
        'gioi_han_moi_nguoi',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'trang_thai',
        'da_du_dung'
    ];
}
