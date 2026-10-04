<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NguoiDungRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'             => 'required|email|unique:nguoi_dungs',
            'password'          => 'required|string|min:6',
            'so_dien_thoai'     => 'nullable|string|max:20|unique:nguoi_dungs',
            'ho_ten'            => 'required|string|max:150',
            'anh_dai_dien'      => 'nullable|string',
            'vai_tro'           => 'integer|in:0,1,2',
            'trang_thai'        => 'integer|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'        => 'Email không được để trống',
            'email.unique'          => 'Email đã tồn tại',
            'password.required'     => 'Mật khẩu không được để trống',
            'ho_ten.required'       => 'Họ tên không được để trống',
        ];
    }
}
