<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tasks';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    protected $fillable = ['name', 'description', 'schedule_date', 'project_id'];

//Relations

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
}
