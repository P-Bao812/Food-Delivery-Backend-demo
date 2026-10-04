<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucMonAnUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                => 'required|exists:danh_muc_mon_ans,id',
            'id_nha_hang'       => 'required|integer',
            'ten_danh_muc'      => 'required|string|max:255',
            'hinh_anh'          => 'nullable|string',
            'trang_thai'        => 'integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return ['id.exists' => 'Danh mục món ăn không tồn tại'];
    }
}
