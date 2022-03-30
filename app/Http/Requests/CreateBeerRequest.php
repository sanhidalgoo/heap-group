<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateBeerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user() && Auth::user()->getRole() == 'Admin';
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
            'brand' => 'required|max:255',
            'origin' => 'required|max:255',
            'abv' => 'required|numeric|gte:0|lte:1',
            'ingredient' => 'required|max:255',
            'flavor' => 'required|max:255',
            'format' => 'required|max:255',
            'price' => 'required|numeric|gte:0',
            'details' => '',
            'quantity_available' => 'required|numeric',
            'image_url' => 'required|max:2048',
        ];
    }
}
