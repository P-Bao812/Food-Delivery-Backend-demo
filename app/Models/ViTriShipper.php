<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViTriShipper extends Model
{
    protected $table='vi_tri_shippers';
    protected $fillable = [
        'id_shipper',
        'vi_do',
        'kinh_do',
        'toc_do',
        'huong_di_chuyen',
        'thoi_gian_ghi',
        'trang_thai'
    ];
}
