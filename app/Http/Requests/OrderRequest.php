<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'postal_code' => 'required|max:255',
            'county' => 'required|max:255',
            'email' => 'required|email|max:255',
        ];
    }
}
