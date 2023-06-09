<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSafariRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('categories')->ignore($this->route('category'))
            ],
            'slug' => [
                'required',
                Rule::unique('categories')->ignore($this->route('category'))
            ], 
            'price_from' => 'nullable|numeric',
            'resident_price' => 'nullable|numeric',
            'non_resident_price' => 'nullable|numeric',
            'cover' => 'required|image',
            'gallery.*' => 'nullable|image',
            'subcategoryId' => 'required'
        ];
    }
}
