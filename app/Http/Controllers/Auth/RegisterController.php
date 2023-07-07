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
            'username'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed|min:8'
        ]);
        $user = new User;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        //return "successful";
        
       // Auth::login($user);
        return redirect('/login');

    }
}
