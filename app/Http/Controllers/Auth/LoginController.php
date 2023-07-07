<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function authenticate(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $email = $request->input('email') ;
        $password = $request->input('password');

        if(Auth::attempt(['email'=>$email,'password'=>$password])){
           $user = User::where ('email',$email)->first();
           Auth::login($user);
           if( $user->role == 'Admin'){
            return redirect('/home');
           }else{
            return redirect('/products');
           }
          
        }else{
            return back()->withErrors(['Invalid Credentials']);
        }
    
        }
        
        public function logout(){
            Auth::logout();
            return redirect('/login');
        }

    }


