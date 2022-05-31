<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    /*Fields
     * id
     * project_id
     * name
     * schedule_date
     * description
     *
     * created_at
     * updated_at
     * deleted_at
     * */


    protected $table = 'tasks';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected $fillable = ['name', 'description', 'schedule_date', 'project_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @param Project $project
     * @param Request $request
     * @return Task
     */
    public static function create(Project $project, Request $request){
        $task = new Task(['name'=> $request->name,
            'description'=>$request->description,
            'schedule_date'=>$request->schedule_date,
            'project_id'=>$project->id
        ]);
        $task->save();
        return $task;
    }

//Relations

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
}
