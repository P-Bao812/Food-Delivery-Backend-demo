<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhuyenMaiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
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
            'id_nha_hang.required'          => 'ID nhà hàng không được để trống',
            'ten_khuyen_mai.required'       => 'Tên khuyến mãi không được để trống',
            'mo_ta.required'                => 'Mô tả không được để trống',
            'ngay_ket_thuc.after_or_equal'  => 'Ngày kết thúc phải sau hoặc cùng ngày với ngày bắt đầu',
        ];
    }
}
