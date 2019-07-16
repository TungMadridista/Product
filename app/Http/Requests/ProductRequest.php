<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name_product' => 'required|min:3|max:20|unique:products,name_product,'.($this->id ?? " "),
            'price'=> 'required',
            'image'=> ($this->id ? 'nullable' : 'required').'|image'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute Can not be empty',
            'min' => ':attribute fade away 3-> 20',
            'max' => ':attribute fade away 3-> 20',
            'unique' => ':attribute used',
            'image' => ':attribute pahi la anh',

        ];

    }

    public function attributes()
    {
        return [
            'name_product' => 'Product Name',
            'price' => 'Price',
            'image' => 'Images'
        ];

    }
}
