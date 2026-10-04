<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaChiKhachHangUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                => 'required|exists:dia_chi_khach_hangs,id',
            'id_khach_hang'     => 'required|integer',
            'ten_dia_chi'              => 'required|string|max:255',
            'dia_chi'    => 'required|string|max:255',
            'vi_do'             => 'nullable|string',
            'kinh_do'           => 'nullable|string',
            'so_dien_thoai'     => 'required|string|max:12',
        ];
    }

    public function messages(): array
    {
        return ['id.exists' => 'Địa chỉ khách hàng không tồn tại'];
    }
}
