<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreOrUpdateRequest;
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
    public function index(Project $project)
    {
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|FactoryAlias|View
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Project $project
     * @param TaskStoreOrUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Project $project, TaskStoreOrUpdateRequest $request)
    {
        $validated = $request->validated();
        $validated['project_id'] = $project->id;

        $task = new Task($validated);
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
    public function show(Project $project, Task $task)
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
    public function edit(Project $project, Task $task)
    {
        return view('task.edit',['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Project $project
     * @param Task $task
     * @param TaskStoreOrUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(Project $project, Task $task, TaskStoreOrUpdateRequest $request)
    {
        $task->update($request->validated());

        return redirect()->route('project.show',['project' => $task->project_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return redirect()->route('project.show',['project' => $task->project_id]);
    }
}
