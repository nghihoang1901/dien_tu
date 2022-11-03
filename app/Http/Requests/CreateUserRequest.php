<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'username' => 'required|min:5',
            'password' => 'required|min:8',
            'email' => 'required|email',
            'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            
        ];
    }

    public function messages(){
        return [
            'username.required' => 'Vui lòng nhập tên tài khoản',
            'username.min' => 'Tên tài khoản phải có ít nhất 5 ký tự',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'avatar.image' => 'test message',
            'avatar.mimes' => 'Đây là file chưa hợp lệ hoặc là hình ảnh dạng mở rộng chưa được cho phép',
            'avatar.max' => 'Kích thước file quá lớn, vui lòng chọn file nhỏ hơn'
        ];
    }
}
