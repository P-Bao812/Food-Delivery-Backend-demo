<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ThanhToanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_don_hang'           => 'required|integer',
            'phuong_thuc'           => 'required|string|max:255',
            'so_tien'               => 'required|integer|min:0',
            'ma_giao_dich'          => 'nullable|string|max:255',
            'trang_thai'            => 'integer|in:0,1,2',
            'thoi_gian_thanh_toan'  => 'nullable|date_format:Y-m-d H:i:s',
            'phan_hoi_cong'         => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'id_don_hang.required'  => 'ID đơn hàng không được để trống',
            'phuong_thuc.required'  => 'Phương thức thanh toán không được để trống',
            'so_tien.required'      => 'Số tiền không được để trống',
        ];
    }
}
