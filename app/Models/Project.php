<?php

namespace App\Models;

use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Project extends Model
{
    use HasFactory;

    /*Fields
     * id
     * owner_id
     * name
     *
     * created_at
     * updated_at
     * */

    protected $table = 'projects';

    protected $fillable = ['name', 'owner_id'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
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
