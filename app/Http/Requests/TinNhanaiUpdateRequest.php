<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinNhanaiUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                    => 'required|exists:tin_nhanais,id',
            'id_phien'              => 'required|integer',
            'vai_tro'               => 'required|in:user,assistant',
            'noi_dung'              => 'required|string',
            'so_token_dung'         => 'integer|min:0',
            'id_mon_an_goi_y'       => 'nullable|integer',
            'id_coupon_goi_y'       => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return ['id.exists' => 'Tin nhắn AI không tồn tại'];
    }
}
