<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\User_Project;
use Illuminate\Http\Request;
use Illuminate\View\View;


class DashboardController extends Controller
{
    public function show($projectId)
    {
        $user = User::query()->where('id','=',3)->first();
        $project = Project::query()->where('id', $projectId)->first();

        $personal = User_Project::getOptionsForUser($user);
        $shared = User_Project::getOptionsForUser($user);
        $members = User_Project::getMembersForProject($project);
        $options = ['personal' => $personal->all(), 'shared' => $shared];
        $project = [ 'head' => $project, 'days' => $project->getSortedDays()];

        //TODO Сделать нормальную передачу данных
        $data = ['user' => $user,
            'project' => $project,
            'options' => $options,
            'members' => $members
        ];
        return view('dashboard',)->with('data',$data);
    }
}
