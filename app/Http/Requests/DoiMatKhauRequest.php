<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class DoiMatKhauRequest extends FormRequest
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
            'new_password' => 'required|string|min:6',
            're_password' => 'required|same:new_password'
        ];
    }

    public function messages()
    {
        return [
            'new_password.required' => 'Vui lòng nhập mật khẩu mới',
            're_password.required' => 'Vui lòng nhập mật xác nhận',
            're_password.same' => 'Mật khẩu xác nhập phải trùng với mật khẩu mới',
        ];
    }
}
