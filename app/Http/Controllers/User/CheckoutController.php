<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //checkout page
    public function checkoutPage(){
        return view('frontEnd.checkout');
    }
}