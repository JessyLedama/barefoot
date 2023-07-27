<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSafariRequest extends FormRequest
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
            'name' => 'required|unique:safaris',
            'price_from' => 'nullable|numeric',
            'resident_price' => 'nullable|numeric',
            'non_resident_price' => 'nullable|numeric',
            'cover' => 'required|image',
            'gallery.*' => 'nullable|image',
            'subcategoryId' => 'required',
            'map_image' => 'nullable|image',
            'subcategoryId' => 'required'
        ];
    }
}
