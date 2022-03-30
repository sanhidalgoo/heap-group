<?php

// Authors: Juan Sebastián Díaz

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            "paymentMethod" => "required|in:CREDIT_CARD,CASH,PSE",
            "department" => "required",
            "city" => "required",
            "address" => "required",
        ];
    }
}
