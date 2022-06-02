<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreOrUpdateRequest;
use App\Http\Resources\Project\ProjectCollection;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Project::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {

        return response()->json(Auth::user()->projects, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectStoreOrUpdateRequest $request
     * @return JsonResponse
     */
    public function store(ProjectStoreOrUpdateRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $validated['owner_id'] = $request->user()->id;

        $project = new Project($validated);
        $project->save();
        $request->user()->projects()->attach($project);

        return response()->json($project, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return JsonResponse
     */
    public function show(Project $project): JsonResponse
    {
        $project->load('members');
        return response()->json($project, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectStoreOrUpdateRequest $request
     * @param Project $project
     * @return JsonResponse
     */
    public function update(ProjectStoreOrUpdateRequest $request, Project $project): JsonResponse
    {
        $project->update($request->validated());
        return response()->json($project, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return JsonResponse
     */
    public function destroy(Project $project): JsonResponse
    {
        $project->members()->detach();
        $project->delete();

        return response()->json(null , 204);
    }
}
