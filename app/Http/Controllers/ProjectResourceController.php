<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectResourceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Project::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('projectCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $project = new Project(['name' => $request->project_name, 'owner_id' => $request->user()->id]);
        $project->save();
        $request->user()->projects()->attach($project->id);
        return redirect()->route('project.show',['project'=>$project->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(Project $project): View|Factory|RedirectResponse|Application
    {
        $user = User::query()->where('id',Auth::id())->first();

        if ($project == NULL){
            return redirect()->route('project.show',['project'=>$user->projects()->first()->id]);
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

        $data = ['user' => $user,
            'project' => $project,
            'options' => $options,
            'members' => $members
        ];

        return view('dashboard')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function edit(Project $project): View|Factory|Application
    {
        return view('projectEdit',['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Project $project, Request $request): RedirectResponse
    {
        $project->name = $request->name;
        $project->save();

        return redirect()->route('project.show',['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->members()->detach();
        $project->delete();

        return redirect(RouteServiceProvider::HOME);
    }
}
