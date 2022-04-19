<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    //Вывести форму
    public function show(){
        return view('signInForm');
    }


    public function authenticate(Request $request){
        $credentials =$request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/workspace');
        }

        return back()->withErrors([
            'email' => 'Credentials do not match!'
        ]);
    }

    //Валидация авторизации
    public function index(Request $request){

        return dd([$request->all(),User::all()->all()]);
    }
}
