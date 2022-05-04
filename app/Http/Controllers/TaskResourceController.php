<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskResourceController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Task::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Project $project)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|FactoryAlias|View
     */
    public function create(): View|FactoryAlias|Application
    {
        return view('taskCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $task = new Task(['name'=> $request->name,
            'description'=>$request->description,
            'schedule_date'=>$request->schedule_date,
            'project_id'=>$request->project
            ]);
        $task->save();
        return redirect()->route('project.show',['project' => $request->project]);
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
        return view('task')->with('task',$task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return Application|FactoryAlias|View
     */
    public function edit(Project $project, Task $task): View|FactoryAlias|Application
    {
        return view('taskEdit',['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Task $task
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
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Project $project, Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('project.show',['project' => $task->project_id]);
    }
}
