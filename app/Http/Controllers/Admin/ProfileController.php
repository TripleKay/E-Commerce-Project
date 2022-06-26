<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;

class ProfileController extends Controller
{
    //index
    public function index(){
        $data = User::where('id',Auth::user()->id)->first();
        return view('admin.profile.editProfile')->with(['data'=>$data]);
    }

    //edit profile
    public function editProfile(Request $request){
        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
        ]);
        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        User::where('id',Auth::user()->id)->update($updateData);
        return back()->with(['success'=>'Your Profile updated successfully']);
    }

    //edit password page
    public function editPassword(){
        return view('admin.profile.editPassword');
    }
}
