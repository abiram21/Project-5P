<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodUpdateRequest extends FormRequest
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
            'name'=>'required|alpha',
            'minQty'=>'required|integer|min:0',
            'maxQty'=>'required|integer|min:0|gt:minQty',
            'unit_price'=>'required|numeric|min:0'
        ];
    }
}
