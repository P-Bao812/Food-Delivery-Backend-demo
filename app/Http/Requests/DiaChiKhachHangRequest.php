<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaChiKhachHangRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_khach_hang'     => 'required|integer',
            'ten_dia_chi'              => 'required|string|max:255',
            'dia_chi'           => 'required|string|max:255',
            'vi_do'             => 'nullable|string',
            'kinh_do'           => 'nullable|string',
            'so_dien_thoai'     => 'required|string|max:12',

        ];
    }

    public function messages(): array
    {
        return [
            'id_khach_hang.required'    => 'ID khách hàng không được để trống',
            'nhan.required'             => 'Tên người nhận không được để trống',
            'dia_chi_day_du.required'   => 'Địa chỉ đầy đủ không được để trống',
        ];
    }
}
