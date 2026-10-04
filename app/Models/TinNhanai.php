<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TinNhanai extends Model
{
    protected $table = 'tin_nhanais';
    protected $fillable = [
        'id_phien',
        'vai_tro',
        'noi_dung',
        'so_token_dung',
        'id_mon_an_goi_y',
        'id_coupon_goi_y',
        'ngay_tao',
    ];
}
