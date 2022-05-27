<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TasksController extends Controller
{
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
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $task = Task::create($request);

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param Task $task
     * @return JsonResponse
     */
    public function show(Project $project, Task $task): JsonResponse
    {

        return response()->json($task, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @param Task $task
     * @return JsonResponse
     */
    public function update(Request $request, Project $project, Task $task): JsonResponse
    {
        $task->update($request->all());

        return response()->json($task);
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

        return response()->json(null, 204);
    }
}
