<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
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
            'email'         => 'required',
            'ho_ten'        => 'required',
            'password'      => 'required|string|min:6',
            're_password'   => 'required|same:new_password',
            'captcha'       => 'required',
            'anh_dai_dien'      => 'nullable|string',
            'vai_tro'           => 'nullable|integer|in:0,1,2',
            'trang_thai'        => 'nullable|integer|in:0,1',
        ];
    }
    public function messages()
    {
        return [
            'ho_ten.required' => 'Họ tên không được để trống',
            'password.required' => 'Vui lòng nhập mật khẩu mới',
            're_password.required' => 'Vui lòng nhập mật xác nhận',
            're_password.same' => 'Mật khẩu xác nhập phải trùng với mật khẩu mới',
        ];
    }
}
