<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Geocode;

class RegistrationController extends Controller
{
    public function create(){
        if(Auth::check()){
            return redirect('home');
        } else {
            return view('register');
        }
    }

    public function store(Request $request) {

        request()->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'name' => 'required',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
            'postcode' => 'required'
        ]);

        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->postcode = request('postcode');
        $user->password = request('password');
        
        $response = Geocode::make()->address($user->postcode);

        if ($response) {
            $user->lat= $response->latitude();
            $user->long=$response->longitude();

            $user->save();
            auth()->login($user);
            return redirect('/home');
        } else {
            return redirect('/register')->with('mssg', 'Post Code invalid!');
        }


    }
}
