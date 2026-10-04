<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucMonAnRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_nha_hang'       => 'required|integer',
            'ten_danh_muc'      => 'required|string|max:255',
            'hinh_anh'          => 'nullable|string',
            'trang_thai'        => 'integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'id_nha_hang.required'  => 'ID nhà hàng không được để trống',
            'ten_danh_muc.required' => 'Tên danh mục không được để trống',
        ];
    }
}
