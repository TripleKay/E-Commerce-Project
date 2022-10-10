<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CartCheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (Session::has('cart') && count(Session::get('cart')) == 0) || !Session::has('cart');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your cart is empty!';
    }
}