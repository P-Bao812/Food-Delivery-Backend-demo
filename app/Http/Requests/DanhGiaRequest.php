<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhGiaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
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
            'id_don_hang.required'   => 'ID đơn hàng không được để trống',
            'id_khach_hang.required' => 'ID khách hàng không được để trống',
            'id_nha_hang.required'   => 'ID nhà hàng không được để trống',
            'id_shipper.required'    => 'ID shipper không được để trống',
        ];
    }
}
