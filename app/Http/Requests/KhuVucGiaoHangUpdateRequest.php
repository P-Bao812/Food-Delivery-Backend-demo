<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhuVucGiaoHangUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                        => 'required|exists:khu_vuc_giao_hangs,id',
            'id_nha_hang'               => 'required|integer',
            'ten_khu_vuc'               => 'required|string|max:255',
            'phi_giao_hang'             => 'required|integer|min:0',
            'khoang_cach_toi_da_km'     => 'required|integer|min:0',
            'thoi_gian_du_kien_phut'    => 'required|integer|min:0',
            'trang_thai'                => 'integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return ['id.exists' => 'Khu vực giao hàng không tồn tại'];
    }
}
