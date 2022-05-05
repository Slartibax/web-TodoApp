<?php

namespace App\Models;

use Carbon\Traits\Date;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = ['name', 'owner_id'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at', 'owner_id'];
    protected $dates = ['created_at', 'updated_at'];

    //Relations
    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function owner(){
        return $this->belongsTo(User::class,'owner_id');
    }

    public function members(){
        return $this->belongsToMany(User::class,'users_projects','project_id');
    }
}
