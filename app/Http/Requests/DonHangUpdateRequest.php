<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class DonHangUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id'                        => 'required|exists:don_hangs,id',
            'id_khach_hang'             => 'required|integer',
            'id_nha_hang'               => 'required|integer',
            'id_shipper'                => 'nullable|integer',
            'id_dia_chi'                => 'required|integer',
            'id_khu_vuc_giao_hang'      => 'nullable|integer',
            'id_coupon'                 => 'nullable|integer',
            'trang_thai'                => 'integer|in:0,1,2,3,4',
            'tong_tien_hang'            => 'required|integer|min:0',
            'phi_giao_hang'             => 'required|integer|min:0',
            'tien_giam_gia'             => 'required|integer|min:0',
            'tong_thanh_toan'           => 'required|integer|min:0',
            'ghi_chu'                   => 'nullable|string',
            'thoi_gian_du_kien_giao'    => 'nullable|date_format:Y-m-d H:i:s',
            'phuong_thuc_thanh_toan'    => 'integer|in:0,1,2',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'                   => 'ID đơn hàng không được để trống',
            'id.exists'                     => 'Đơn hàng không tồn tại',
            'id_khach_hang.required'        => 'ID khách hàng không được để trống',
            'id_nha_hang.required'          => 'ID nhà hàng không được để trống',
            'id_dia_chi.required'           => 'ID địa chỉ không được để trống',
            'tong_tien_hang.required'       => 'Tổng tiền hàng không được để trống',
            'phi_giao_hang.required'        => 'Phí giao hàng không được để trống',
            'tong_thanh_toan.required'      => 'Tổng thanh toán không được để trống',
        ];
    }
}
