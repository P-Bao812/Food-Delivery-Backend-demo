<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhuyenMaiUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                    => 'required|exists:khuyen_mais,id',
            'id_nha_hang'           => 'required|integer',
            'ten_khuyen_mai'        => 'required|string|max:100',
            'mo_ta'                 => 'required|string|max:100',
            'kieu_giam'            => 'integer|in:0,1',
            'so_tien_giam'         => 'required|integer',
            'dieu_kien_toi_thieu'  => 'required|integer',
            'ngay_bat_dau'         => 'required|date',
            'ngay_ket_thuc'        => 'required|date|after_or_equal:ngay_bat_dau',
            'trang_thai'           => 'integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'                   => 'ID khuyến mãi không được để trống',
            'id.exists'                     => 'Khuyến mãi không tồn tại',
            'ngay_ket_thuc.after_or_equal'  => 'Ngày kết thúc phải sau hoặc cùng ngày với ngày bắt đầu',
        ];
    }
}
