<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductTypeRequest extends FormRequest
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
            'name_product_type' => 'required|min:3|max:20|unique:product_types,name_product_type,'.($this->id ?? " "),

        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute can not be empty',
            'min' => ':attribute fade away 3-> 20',
            'max' => ':attribute fade away 3-> 20',
            'unique' => ':attribute used',
        ];

    }

    public function attributes()
    {
        return [
            'name_product_type' => 'Product Type Name'
        ];

    }
}
