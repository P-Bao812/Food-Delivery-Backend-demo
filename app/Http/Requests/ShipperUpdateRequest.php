<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ShipperUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                    => 'required|exists:shippers,id',
            'id_nguoi_dung'         => 'required|integer',
            'bien_so_xe'            => 'required|string|max:20',
            'loai_xe'               => 'required|string|max:100',
            'so_cccd'               => 'required|string|max:20',
            'san_sang_nhan_don'     => 'boolean',
            'diem_danh_gia_tb'      => 'numeric|min:0|max:5',
            'trang_thai'            => 'in:cho_duyet,hoat_dong,bi_khoa',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'           => 'ID shipper không được để trống',
            'id.exists'             => 'Shipper không tồn tại',
            'bien_so_xe.required'   => 'Biển số xe không được để trống',
            'loai_xe.required'      => 'Loại xe không được để trống',
            'so_cccd.required'      => 'Số CCCD không được để trống',
        ];
    }
}
