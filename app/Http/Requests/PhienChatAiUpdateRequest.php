<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhienChatAiUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                    => 'required|exists:phien_chat_ais,id',
            'id_nguoi_dung'         => 'required|integer',
            'token_phien'           => 'required|string|max:500',
            'chu_de'                => 'nullable|string|max:255',
            'bat_dau_luc'           => 'nullable|date_format:Y-m-d H:i:s',
            'ket_thuc_luc'          => 'nullable|date_format:Y-m-d H:i:s',
            'dang_hoat_dong'        => 'boolean',
        ];
    }

    public function messages(): array
    {
        return ['id.exists' => 'Phiên chat AI không tồn tại'];
    }
}
