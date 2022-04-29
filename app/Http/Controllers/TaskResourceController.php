<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Couchbase\RegexpSearchQuery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class TaskResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dashboard = new DashboardController();
        return $dashboard->show($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taskCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task(['name'=> $request->name,
            'description'=>$request->description,
            'schedule_date'=>$request->schedule_date,
            'project_id'=>$request->segment(3)
            ]);
        $task->save();
        return redirect()->route('project.show',['project' => $request->project]);
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $task = Task::query()->where('id',$request->task)->first();
        if($task<>NULL){
            return view('task')->with('task',$task);
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return Application|FactoryAlias|View
     */
    public function edit(Request $request)
    {
        return view('taskEdit',['project' => $request->project, 'task' => $request->task, 'taskModel'=>Task::query()->find($request->task)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $task = Task::query()->find($request->task);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->schedule_date = $request->schedule_date;
        $task->save();

        return redirect()->route('project.show',['project' => $request->project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $task = Task::query()->where('id',$request->task)->first();
        $task->delete();
        return redirect()->route('project.show',['project' => $request->project]);
    }
}
