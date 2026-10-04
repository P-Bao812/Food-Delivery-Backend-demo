<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuanTriVienRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_nguoi_dung'     => 'required|integer',
            'phong_ban'         => 'nullable|string|max:150',
        ];
    }

    public function messages(): array
    {
        return ['id_nguoi_dung.required' => 'ID người dùng không được để trống'];
    }
}
