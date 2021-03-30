<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('home');
        } else {
            return view('login');
        }
        
    }

    public function login(){

        request()->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required',
        ]);

        $userdata = array(
            'email'     => request('email'),
            'password'  => request('password')
        );

        if (Auth::attempt($userdata)) {

            return redirect('/home');
    
        } else {        

            return redirect('/login');
    
        }
    }
    public function logout(Request $request) {
        return redirect('login')->with(Auth::logout());
      }
}
