<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:5|max:20',
            'email' => 'required|email',
            'password' => 'required|min:5|max:20',
            'c_password' => 'required|min:3|max:50|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Phải có tên',
            'name.min' => 'Phải có ít nhất 5 đến 20 ký tự',
            'name.unique' => 'Tên đã được sử dụng',

            'email' => 'Phải có email',
            'email.email' => 'Phải có định dạng email',
            'email.unique' => 'Email đã được sử dụng',

            'password.required' => 'Phải có mật khẩu',
            'password.min' => 'Phải có ít nhất 5 đến 20 ký tự',

            'c_password.same' => '2 mật khẩu không giống nhau'
        ];
    }
}
