<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuanTriVienUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                => 'required|exists:quan_tri_viens,id',
            'id_nguoi_dung'     => 'required|integer',
            'phong_ban'         => 'nullable|string|max:150',
        ];
    }

    public function messages(): array
    {
        return ['id.exists' => 'Quản trị viên không tồn tại'];
    }
}
