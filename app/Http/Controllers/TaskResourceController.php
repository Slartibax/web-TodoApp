<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function redirect;
use function view;

class TaskResourceController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Task::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|FactoryAlias|View
     */
    public function create(): View|FactoryAlias|Application
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Project $project
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Project $project, Request $request): RedirectResponse
    {
        $task = new Task(['name'=> $request->name,
            'description'=>$request->description,
            'schedule_date'=>$request->schedule_date,
            'project_id'=>$project->id
            ]);
        $task->save();
        return redirect()->route('project.show',['project' => $project]);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param Task $task
     * @return Application|FactoryAlias|View
     */
    public function show(Project $project, Task $task): View|FactoryAlias|Application
    {
        return view('task.show')->with('task',$task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @param Task $task
     * @return Application|FactoryAlias|View
     */
    public function edit(Project $project, Task $task): View|FactoryAlias|Application
    {
        return view('task.edit',['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Project $project
     * @param Task $task
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Project $project, Task $task, Request $request): RedirectResponse
    {
        $task->name = $request->name;
        $task->description = $request->description;
        $task->schedule_date = $request->schedule_date;
        $task->save();

        return redirect()->route('project.show',['project' => $task->project_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Project $project, Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('project.show',['project' => $task->project_id]);
    }
}
