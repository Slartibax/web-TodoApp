<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
            $user = User::query()->where('email',$credentials['email'])->first();
            $project = Project::query()->where('owner_id',$user->id)->first();
            return redirect()->route('dashboard.show',['user' => $user, 'project' => $project->id]);
            //return dd([$user, $user->id, $project, $credentials]);
        }

        return back()->withErrors([
            'email' => 'Credentials do not match!'
        ]);
    }

    public function index(Request $request){
        $this->authenticate($request);
        return redirect()->route('dashboard.show',['project' => 3]);
    }
}
