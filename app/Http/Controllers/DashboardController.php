<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     *
     * Решает на какой проект перенаправить пользователя
     * @param Request $request
     * @return RedirectResponse
     */
    public function resolve(Request $request)
    {
        $user = $request->user();
        $project = $user->projects()->first();
        if ($project == NULL){
            //initial project creation
            $project = new Project(['name'=> "My Tasks", 'owner_id'=>$user->id]);
            $project->save();

            //Create relation in intermediate table
            $user->projects()->attach($project->id);
        }

        return redirect()->route('project.show',['project' => $project->id]);
    }

}
