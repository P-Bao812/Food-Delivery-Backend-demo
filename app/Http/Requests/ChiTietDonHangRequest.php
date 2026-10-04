<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChiTietDonHangRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_don_hang'           => 'required|integer',
            'id_mon_an'             => 'required|integer',
            'ten_mon_an_luu_tru'    => 'required|string|max:255',
            'gia_luu_tru'           => 'required|integer|min:0',
            'so_luong'              => 'required|integer|min:1',
            'ghi_chu'               => 'nullable|string',
            'thanh_tien'            => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'id_don_hang.required'      => 'ID đơn hàng không được để trống',
            'id_mon_an.required'        => 'ID món ăn không được để trống',
            'ten_mon_an_luu_tru.required' => 'Tên món ăn lưu trữ không được để trống',
        ];
    }
}
