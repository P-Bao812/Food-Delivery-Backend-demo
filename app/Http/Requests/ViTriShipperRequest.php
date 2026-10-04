<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViTriShipperRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_shipper'        => 'required|integer',
            'vi_do'             => 'required|string',
            'kinh_do'           => 'required|string',
            'toc_do'            => 'required|integer|min:0',
            'huong_di_chuyen'   => 'nullable|string',
            'thoi_gian_ghi'     => 'required|date_format:Y-m-d H:i:s',
            'trang_thai'        => 'integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'id_shipper.required'   => 'ID shipper không được để trống',
            'vi_do.required'        => 'Vĩ độ không được để trống',
            'kinh_do.required'      => 'Kinh độ không được để trống',
            'toc_do.required'       => 'Tốc độ không được để trống',
        ];
    }
}
