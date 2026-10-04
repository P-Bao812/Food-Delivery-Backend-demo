<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class KhachHangUpdateRequest extends FormRequest
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
            'id'                        => 'required|exists:khach_hangs,id',
            'id_nguoi_dung'             => 'required|integer',
            'ngay_sinh'                 => 'nullable|date_format:Y-m-d',
            'diem_tich_luy'             => 'integer|min:0',
            'id_dia_chi_mac_dinh'       => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'               => 'ID khách hàng không được để trống',
            'id.exists'                 => 'Khách hàng không tồn tại',
            'id_nguoi_dung.required'    => 'ID người dùng không được để trống',
            'ngay_sinh.date_format'     => 'Ngày sinh phải có định dạng Y-m-d',
        ];
    }
}
