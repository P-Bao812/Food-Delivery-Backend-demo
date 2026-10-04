<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class MonAnRequest extends FormRequest
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
            'id_nha_hang'                   => 'required|integer',
            'id_danh_muc'                   => 'required|integer',
            'ten_mon_an'                    => 'required|string|max:255',
            'mo_ta'                         => 'nullable|string',
            'hinh_anh'                      => 'nullable|string',
            'gia_ban'                       => 'required|integer|min:0',
            'gia_goc'                       => 'nullable|integer|min:0',
            'thoi_gian_chuan_bi_phut'       => 'nullable|integer|min:0',
            'trang_thai'                    => 'integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'id_nha_hang.required'          => 'ID nhà hàng không được để trống',
            'id_danh_muc.required'          => 'ID danh mục không được để trống',
            'ten_mon_an.required'           => 'Tên món ăn không được để trống',
            'gia_ban.required'              => 'Giá bán không được để trống',
            'gia_ban.min'                   => 'Giá bán phải lớn hơn hoặc bằng 0',
        ];
    }
}
