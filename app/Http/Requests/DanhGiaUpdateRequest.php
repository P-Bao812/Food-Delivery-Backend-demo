<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhGiaUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                => 'required|exists:danh_gias,id',
            'id_don_hang'       => 'required|integer',
            'id_khach_hang'     => 'required|integer',
            'id_nha_hang'       => 'required|integer',
            'id_shipper'        => 'required|integer',
            'diem_do_an'        => 'required|integer',
            'diem_shipper'      => 'required|integer',
            'diem_ung_dung'     => 'required|integer',
            'nhan_xet_do_an'    => 'nullable|string|max:150',
            'nhan_xet_shipper'  => 'nullable|string|max:200',
            'anh_danh_gia'      => 'nullable|string|max:255',
            'trang_thai'        => 'integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'           => 'ID đánh giá không được để trống',
            'id.exists'             => 'Đánh giá không tồn tại',
        ];
    }
}
