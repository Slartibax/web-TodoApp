<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;

class SignUpController extends Controller
{
    public function show(){
        return view('signUpForm');
    }

    //Создание нового пользовател
    public function create(Request $request){
        //New user creation
        $user = new User(['name'=>$request->name, 'email'=>$request->email, 'password' => bcrypt($request->password)]);
        $user->save();

        //initial project creation
        $project = new Project(['name'=> "My Tasks", 'owner_id'=>$user->id]);
        $project->save();

        //Create relation in intermediate table
        $user->projects()->attach($project->id);

        //TODO Реализовать инициализацию нового юзера(создание нового личного проекта)
        return redirect()->route('dashboard.show',['project' => $project->id]);
    }
}
