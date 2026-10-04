<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThuNhapNhaHangUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                => 'required|exists:thu_nhap_nha_hangs,id',
            'id_nha_hang'       => 'required|integer',
            'id_don_hang'       => 'required|integer',
            'doanh_thu_gop'     => 'required|integer|min:0',
            'phi_hoa_hong'      => 'required|integer|min:0',
            'thu_nhap_rong'     => 'required|integer|min:0',
            'trang_thai'        => 'integer',
            'ngay_thanh_toan'   => 'required|date_format:Y-m-d H:i:s',
        ];
    }

    public function messages(): array
    {
        return ['id.exists' => 'Thu nhập nhà hàng không tồn tại'];
    }
}
