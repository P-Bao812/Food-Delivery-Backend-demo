<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TheoDoiDonHangUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                    => 'required|exists:theo_doi_don_hangs,id',
            'id_don_hang'           => 'required|integer',
            'id_shipper'            => 'required|integer',
            'trang_thai'            => 'integer|in:0,1',
            'vi_do'                 => 'required|string',
            'kinh_do'               => 'required|string',
            'ghi_chu'               => 'nullable|string',
            'thoi_diem'             => 'required|date_format:Y-m-d H:i:s',
            'khoan_cach_den_khach'  => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'           => 'ID theo dõi không được để trống',
            'id.exists'             => 'Theo dõi không tồn tại',
            'id_don_hang.required'  => 'ID đơn hàng không được để trống',
            'id_shipper.required'   => 'ID shipper không được để trống',
        ];
    }
}
