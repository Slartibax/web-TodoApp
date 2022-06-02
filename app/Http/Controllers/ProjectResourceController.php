<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreOrUpdateRequest;
use App\Http\Views\Dashboard;
use App\Models\Project;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function view;

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
     * @return Application|Redirector|RedirectResponse
     */
    public function index(Request $request)
    {
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectStoreOrUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(ProjectStoreOrUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['owner_id'] = $request->user()->id;

        $project = new Project($validated);
        $project->save();
        $request->user()->projects()->attach($project);

        return redirect()->route('project.show',['project'=>$project->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return RedirectResponse
     */
    public function show(Project $project)
    {
        $user = User::query()->where('id',Auth::id())->first();

        if ($project == NULL){
            return redirect()->route('project.show',['project'=>$user->projects()->first()->id]);
        }
        return new Dashboard($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function edit(Project $project): View|Factory|Application
    {
        return view('project.edit',['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Project $project, ProjectStoreOrUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $project->update($validated);
        $project->save();

        return redirect()->route('project.show',['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return RedirectResponse
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->members()->detach();
        $project->delete();

        return redirect(RouteServiceProvider::HOME);
    }
}
