<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinNhanaiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
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
        return [
            'id_phien.required'     => 'ID phiên không được để trống',
            'vai_tro.required'      => 'Vai trò không được để trống',
            'noi_dung.required'     => 'Nội dung không được để trống',
        ];
    }
}
