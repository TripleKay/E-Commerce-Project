<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //index
    public function index(){
        $data = User::where('id',Auth::user()->id)->first();
        return view('admin.profile.index')->with(['data'=>$data]);
    }
}