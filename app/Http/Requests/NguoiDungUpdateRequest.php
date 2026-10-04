<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NguoiDungUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                => 'required|exists:nguoi_dungs,id',
            'email'             => 'required|email',
            'password'          => 'required|string|min:6',
            'so_dien_thoai'     => 'nullable|string|max:20',
            'ho_ten'            => 'required|string|max:150',
            'anh_dai_dien'      => 'nullable|string',
            'vai_tro'           => 'integer|in:0,1,2',
            'trang_thai'        => 'integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return ['id.exists' => 'Người dùng không tồn tại'];
    }
}
