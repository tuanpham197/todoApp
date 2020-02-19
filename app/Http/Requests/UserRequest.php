<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'password.required' => 'Không được bỏ trống mật khẩu',
            'password.min' => 'Mật khẩu phải lớn 6 ký tự'
        ];
    }

}
