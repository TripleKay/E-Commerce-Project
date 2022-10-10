<?php

namespace App\Http\Requests\User;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class ConfirmPaymentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = Order::VALIDATION_RULES;
        $rules['paymentScreenshot'] = 'required';
        return $rules;
    }
}