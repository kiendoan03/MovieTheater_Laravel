<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'cus_username' => 'required|unique:customers,customer_username,' . $this->user. ',id',    
            'cus_email' => 'required|email|unique:customers,customer_email,' . $this->user. ',id',
            'cus_phone' => 'required|numeric|digits:10|unique:customers,customer_phonenumber,' . $this->user. ',id',
            // 'cus_password' => 'required|min:6|max:20',
        ];
    }

    public function messages()
    {
        return [
            'cus_email.required' => 'Email không được để trống',
            'cus_email.email' => 'Email không đúng định dạng',
            'cus_email.unique' => 'Email đã tồn tại',
            'cus_username.required' => 'Tên đăng nhập không được để trống',
            'cus_username.unique' => 'Tên đăng nhập đã tồn tại',
            'cus_phone.required' => 'Số điện thoại không được để trống',
            'cus_phone.numeric' => 'Số điện thoại phải là số',
            'cus_phone.digits' => 'Số điện thoại phải có 10 số',
            'cus_phone.unique' => 'Số điện thoại đã tồn tại',
            // 'cus_password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ];
    }
}
