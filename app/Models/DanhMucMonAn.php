<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMucMonAn extends Model
{
    protected $table = 'danh_muc_mon_ans';
    protected $fillable = [
        'id_nha_hang',
        'ten_danh_muc',
        'hinh_anh',
        'trang_thai',
    ];
}
