<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThuNhapShipperRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_shipper'    => 'required|integer',
            'id_don_hang'   => 'required|integer',
            'phi_giao_hang' => 'required|integer|min:0',
            'tien_tip'      => 'required|integer|min:0',
            'tien_thuong'   => 'required|integer|min:0',
            'tong_thu_nhap' => 'required|integer|min:0',
            'trang_thai'    => 'integer|in:0,1',
            'ngay_tao'      => 'required|date_format:Y-m-d H:i:s',
        ];
    }

    public function messages(): array
    {
        return [
            'id_shipper.required'   => 'ID shipper không được để trống',
            'id_don_hang.required'  => 'ID đơn hàng không được để trống',
        ];
    }
}
