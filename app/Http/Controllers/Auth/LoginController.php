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
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        $email = $request->input('email') ;
        $password = $request->input('password');

        if(Auth::attempt(['email'=>$email,'password'=>$password])){
           $user = User::where ('email',$email)->first();
          // Auth::login($user);
           //  $request->authenticate();
             $request->session()->regenerate();

           if( $user->role == 'Admin'){
            return redirect('/home');
           }else{
            return redirect('/products');
           }
          
        }else{
            return back()->withErrors(['Invalid Credentials']);
        }
    
        }
        
        public function logout(Request $request){
            Auth::logout();
            
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }

    }


