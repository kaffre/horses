<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Offers extends FormRequest
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
            'name' => 'required|min:3|max:45',
            'category_id' => 'required',
            'position' => 'required|min:3|max:45',
            'country' => 'required|min:3|max:25',
            'city' => 'required|min:3|max:25',
            'street' => 'required|min:3|max:20',
            'number' => 'required|min:1|max:10',
            'input_img.*' => 'sometimes|required|image'
            // |dimensions:min_width=800,min_height=600
        ];
    }
}
