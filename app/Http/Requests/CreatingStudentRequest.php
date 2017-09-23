<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatingStudentRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'dob.required' => 'Date of birth required.'
        ];
    }
}
