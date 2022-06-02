<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateOrUpdateRequest;
use App\Http\Resources\Task\TaskResource;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return JsonResponse
     */
    public function index(Project $project): JsonResponse
    {

        return response()->json($project->tasks, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Project $project
     * @param TaskCreateOrUpdateRequest $request
     * @return JsonResponse
     */
    public function store(Project $project, TaskCreateOrUpdateRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated['project_id'] = $project->id;

        $task = new Task($validated);
        $task->save();

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param Task $task
     * @return JsonResponse
     */
    public function show(Project $project, Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaskCreateOrUpdateRequest $request
     * @param Project $project
     * @param Task $task
     * @return JsonResponse
     */
    public function update(TaskCreateOrUpdateRequest $request, Project $project, Task $task): JsonResponse
    {
        $task->update($request->validated());

        return response()->json($task, 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param Task $task
     * @return JsonResponse
     */
    public function destroy(Project $project, Task $task): JsonResponse
    {
        $task->delete();

        return response()->json(null, 200);
    }
}
