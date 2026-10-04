<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChiTietDonHangUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                    => 'required|exists:chi_tiet_don_hangs,id',
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
        return ['id.exists' => 'Chi tiết đơn hàng không tồn tại'];
    }
}
