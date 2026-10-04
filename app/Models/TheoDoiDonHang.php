<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheoDoiDonHang extends Model
{
    protected $table = 'theo_doi_don_hangs';
    protected $fillable = [
        'id_don_hang',
        'id_shipper',
        'trang_thai',
        'vi_do',
        'kinh_do',
        'ghi_chu',
        'thoi_diem',
        'khoan_cach_den_khach'
    ];
}
