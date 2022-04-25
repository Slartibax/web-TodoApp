<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\User_Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Null_;


class DashboardController extends Controller
{
    public function show(Request $request)
    {
        $user = User::query()->where('id',Auth::id())->first();
        $project = Project::query()->where('id', $request->project)->first();

        if ($project == NULL){
            return redirect()->route('dashboard.show',['project'=>$user->projects()->first()->id]);
        }

        $personal = $user->projects;
        $shared = $user->projects;
        $members = $project->members;
        $options = ['personal' => $personal, 'shared' => $shared];
        $project = [ 'head' => $project, 'days' => $project->sortedDays()];

        //TODO Сделать нормальную передачу данных
        $data = ['user' => $user,
            'project' => $project,
            'options' => $options,
            'members' => $members
        ];
//        return dd($data);
        return view('dashboard')->with('data', $data);
    }
}
