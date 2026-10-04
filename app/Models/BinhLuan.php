<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table = 'binh_luans';
    protected $fillable = [
        'id_nguoi_dung',
        'id_doi_tuong',
        'id_binh_luan_cha',
        'loai_doi_tuong',
        'noi_dung',
        'so_luot_thich',
        'trang_thai'
    ];
}
