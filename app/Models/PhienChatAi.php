<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhienChatAi extends Model
{
    protected $table = 'phien_chat_ais';
    protected $fillable = [
        'id_nguoi_dung',
        'token_phien',
        'chu_de',
        'bat_dau_luc',
        'ket_thuc_luc',
        'dang_hoat_dong',
        'ngay_tao',
    ];
}
