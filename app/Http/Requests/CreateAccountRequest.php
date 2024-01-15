<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateAccountRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'first_name.required' => 'The First Name field is required.',
            'last_name.required' => 'The Last Name field is required.',
            'email.required' => 'The Email field is required.',
            'email.email' => 'The Email must be a valid email address.',
            'password.required' => 'The Password field is required.',
        ];
    }
}
