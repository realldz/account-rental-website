<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'payment_method' => 'required|string'

        ];
    }
    
    public function messages() {
        return [
            'payment_method.required' => 'Please select a payment method'
        ];
    }
}
