<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffRequest extends FormRequest
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
            'staff_username' => 'required|unique:staff,staff_username,' . $this->staff->id. ',id',    
            'staff_email' => 'required|email|unique:staff,staff_email,' . $this->staff->id. ',id',
            'staff_phonenumber' => 'required|numeric|digits:10|unique:staff,staff_phonenumber,' . $this->staff->id. ',id',
            'staff_pssw' => 'required|min:6|max:20',
        ];
    }

    public function messages()
    {
        return [
            'staff_email.required' => 'Email không được để trống',
            'staff_email.email' => 'Email không đúng định dạng',
            'staff_email.unique' => 'Email đã tồn tại',
            'staff_username.required' => 'Tên đăng nhập không được để trống',
            'staff_username.unique' => 'Tên đăng nhập đã tồn tại',
            'staff_phonenumber.required' => 'Số điện thoại không được để trống',
            'staff_phonenumber.numeric' => 'Số điện thoại phải là số',
            'staff_phonenumber.digits' => 'Số điện thoại phải có 10 số',
            'staff_phonenumber.unique' => 'Số điện thoại đã tồn tại',
            'staff_pssw.required' => 'Mật khẩu không được để trống',
            'staff_pssw.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ];
    }
}
