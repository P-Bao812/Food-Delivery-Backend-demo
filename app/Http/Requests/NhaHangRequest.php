<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NhaHangRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_nguoi_dung'         => 'required|integer',
            'ten_nha_hang'          => 'required|string|max:255',
            'mo_ta'                 => 'nullable|string',
            'dia_chi'               => 'required|string|max:255',
            'vi_do'                 => 'nullable|string',
            'kinh_do'               => 'nullable|string',
            'so_dien_thoai'         => 'required|string|max:20',
            'gio_mo_cua'            => 'nullable|date_format:H:i:s',
            'gio_dong_cua'          => 'nullable|date_format:H:i:s',
            'diem_danh_gia_tb'      => 'numeric|min:0|max:5',
            'dang_mo_cua'           => 'boolean',
            'ty_le_hoan_hang'       => 'integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'id_nguoi_dung.required' => 'ID người dùng không được để trống',
            'ten_nha_hang.required' => 'Tên nhà hàng không được để trống',
            'dia_chi.required'      => 'Địa chỉ không được để trống',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống',
        ];
    }
}
