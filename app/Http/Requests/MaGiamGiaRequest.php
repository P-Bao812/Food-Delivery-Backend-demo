<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaGiamGiaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_nha_hang'           => 'required|integer',
            'ma_code'               => 'required|string|max:50',
            'mo_ta'                 => 'nullable|string|max:100',
            'loai_giam_gia'         => 'integer|in:0,1',
            'gia_tri_giam'          => 'required|integer|min:0',
            'gia_tri_don_toi_thieu' => 'required|integer|min:0',
            'giam_toi_da'           => 'required|integer|min:0',
            'gioi_han_su_dung'      => 'required|integer|min:0',
            'gioi_han_moi_nguoi'    => 'required|integer|min:0',
            'ngay_bat_dau'          => 'required|date_format:Y-m-d H:i:s',
            'ngay_ket_thuc'         => 'required|date_format:Y-m-d H:i:s',
            'da_du_dung'            =>'required|integer|in:0,1'
        ];
    }

    public function messages(): array
    {
        return [
            'id_nha_hang.required'      => 'ID nhà hàng không được để trống',
            'ma_code.required'          => 'Mã code không được để trống',
            'gia_tri_giam.required'     => 'Giá trị giảm không được để trống',
        ];
    }
}
