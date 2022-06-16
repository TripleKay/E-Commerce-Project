<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //redirect create page
    public function createProduct(){
        return view('admin.product.create');
    }
}