<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //Вывести форму
    public function show(){
        if (Auth::guest()){
            return view('signInForm');
        }
        if (Auth::check()){
            $user = User::query()->find(Auth::id());
            return redirect()->route('dashboard.show',['project'=> $user->projects()->first()]);
        }
        return view('signInForm');
    }

    public function authenticate(Request $request){
        //TODO Возможно лишняя проверка
        if (Auth::check()){
            $user = User::query()->find(Auth::id());
            return redirect()->route('dashboard.show',['project'=> $user->projects()->first()]);
        }

        $credentials =$request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = User::query()->where('email',$credentials['email'])->first();
            return redirect()->route('dashboard.show',['project' => $user->projects->first()->id]);
        }

        return back()->withErrors([
            'email' => 'Credentials do not match!'
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.show');
    }
}
