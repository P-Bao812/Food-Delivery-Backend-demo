<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponKhachHangUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                => 'required|exists:coupon_khach_hangs,id',
            'id_khach_hang'     => 'required|integer',
            'id_coupon'         => 'required|integer',
            'so_lan_da_dung'    => 'integer|min:0',
            'lan_cuoi_su_dung'  => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return ['id.exists' => 'Coupon khách hàng không tồn tại'];
    }
}
