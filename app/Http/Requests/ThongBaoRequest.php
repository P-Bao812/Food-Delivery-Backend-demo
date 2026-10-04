<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThongBaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
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
        return [
            'id_nguoi_dung.required'    => 'ID người dùng không được để trống',
            'loai.required'             => 'Loại thông báo không được để trống',
            'tieu_de.required'          => 'Tiêu đề không được để trống',
            'noi_dung.required'         => 'Nội dung không được để trống',
        ];
    }
}
