<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThongBaoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                    => 'required|exists:thong_baos,id',
            'id_nguoi_dung'         => 'required|integer',
            'loai'                  => 'required|string|max:100',
            'tieu_de'               => 'required|string|max:255',
            'noi_dung'              => 'required|string',
            'loai_tham_chieu'       => 'nullable|string|max:100',
            'id_tham_chieu'         => 'nullable|integer',
            'da_doc'                => 'boolean',
            'fcm_token'             => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return ['id.exists' => 'Thông báo không tồn tại'];
    }
}
