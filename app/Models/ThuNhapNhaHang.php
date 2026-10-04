<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThuNhapNhaHang extends Model
{
    protected $table = 'thu_nhap_nha_hangs';
    protected $fillable = [
        'id_nha_hang',
        'id_don_hang',
        'doanh_thu_gop',
        'phi_hoa_hong',
        'thu_nhap_rong',
        'trang_thai',
        'ngay_thanh_toan',
    ];
}
