<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        $user = User::query()->where('id',Auth::id())->first();
        $project = Project::query()->where('id', $request->project)->first();

        if ($project == NULL){
            return redirect()->route('dashboard.show',['project'=>$user->projects()->first()->id]);
        }

        $personal = $user->projects->filter(function($value, $key) {
            return count($value->members) < 2;
        });
        $shared = $user->projects->filter(function($value, $key) {
            return count($value->members) >= 2;
        });

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
