<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index(){

        if(Auth::check()){
            return view('home');
        } else {
            return view('login');
            }
        }
        public function getAll(){
            $users = User::all();
            return response()->json(['users' => $users]);
        }
}
