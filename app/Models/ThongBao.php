<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    protected $table = 'thong_baos';
    protected $fillable = [
        'id_nguoi_dung',
        'loai',
        'tieu_de',
        'noi_dung',
        'loai_tham_chieu',
        'id_tham_chieu',
        'da_doc',
        'ngay_tao',
        'fcm_token',
    ];
}
