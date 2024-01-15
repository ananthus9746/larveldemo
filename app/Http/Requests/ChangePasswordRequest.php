<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6'
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'The Old Password field is Required',
            'password.required' => 'The New Password field is Required',
            'confirm_password.required' => 'The Confirm Password field is Required',
            'confirm_password.same' => 'The Confirm Password must match with New Password.',
        ];
    }
}
