<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class BinhLuanRequest extends FormRequest
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
            'id_nguoi_dung'     => 'required|integer',
            'id_doi_tuong'      => 'required|integer',
            'id_binh_luan_cha'  => 'nullable|integer',
            'loai_doi_tuong'    => 'integer|in:0,1,2',
            'noi_dung'          => 'string|max:200',
            'so_luot_thich'     => 'integer',
            'trang_thai'        => 'integer|in:0,1,2'
        ];
    }

    public function messages(): array
    {
        return [
            'id_nguoi_dung.required' => 'ID người dùng không được để trống',
            'id_doi_tuong'          => 'ID đối tượng không được để trống',
        ];
    }
}
