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
            'username' => 'required|unique:users,username,'.($this->id ?? " "),
            'password' => 'required',
            'email' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Username can not be empty',
            'username.unique' => 'Username used',
            'password.required' => 'Password can not be empty',
            'email.required' => 'Email can not be empty',
        ];
    }
}
