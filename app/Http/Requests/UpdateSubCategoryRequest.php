<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateSubCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'This field is required',
            'name.required' => 'The field is required'
        ];
    }
}
