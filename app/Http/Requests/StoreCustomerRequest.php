<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|unique:customers,customer_username,',    
            'cus_email' => 'required|email|unique:customers,customer_email,',
            'cus_phonenumber' => 'required|numeric|digits:10|unique:customers,customer_phonenumber,',
            'password' => 'required|min:6|max:20',
        ];
    }

    public function messages()
    {
        return [
            'cus_email.required' => 'Email không được để trống',
            'cus_email.email' => 'Email không đúng định dạng',
            'cus_email.unique' => 'Email đã tồn tại',
            'username.required' => 'Tên đăng nhập không được để trống',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'cus_phonenumber.required' => 'Số điện thoại không được để trống',
            'cus_phonenumber.numeric' => 'Số điện thoại phải là số',
            'cus_phonenumber.digits' => 'Số điện thoại phải có 10 số',
            'cus_phonenumber.unique' => 'Số điện thoại đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ];
    }
}
