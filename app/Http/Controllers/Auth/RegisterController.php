<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;



class RegisterController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'username'=>'required|regex:/^[^\d]+$/|string',
            'email'=>'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/|unique:users',
            'password'=>'required|min:8|confirmed|'
        ]);
        $user = new User;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
         $user->save();
        //return "successful";
        // Auth::login($user);
        return  redirect('/login')->with('success','User Created Successfully')
        ;
      

    }
}
