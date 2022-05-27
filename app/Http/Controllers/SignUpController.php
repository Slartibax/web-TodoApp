<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use function back;
use function bcrypt;
use function redirect;
use function view;

class SignUpController extends Controller
{
    public function show(){
        return view('signUpForm');
    }

    //Создание нового пользователя
    public function create(Request $request){
        if(User::query()->where('email',$request->email)->exists()){
            return back()->withErrors([
                'email' => 'Указанный адрес электронной почты уже занят'
            ]);
        }

        //New user creation
        $user = new User(['name'=>$request->name, 'email'=>$request->email, 'password' => bcrypt($request->password)]);
        $user->save();

        //initial project creation
        $project = new Project(['name'=> "My Tasks", 'owner_id'=>$user->id]);
        $project->save();

        //Create relation in intermediate table
        $user->projects()->attach($project->id);

        return redirect()->route('dashboard.show',['project' => $project->id]);
    }
}
