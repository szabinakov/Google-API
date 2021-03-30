<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
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

    public function contact(){
        return view('contact');
    }
        
    public function send(Request $request){

        request()->validate([
            'name' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $contact = [
            'name' => $request['name'], 
            'email' => $request['email'],
            'subject' => $request['subject'],
            'message' => $request['message'],
        ];

        Mail::to('receipent@domain.com')->send(new ContactFormMail($contact));

        return redirect('/home')->with('mssg', 'Your Mail has been sent!');

        }
}
