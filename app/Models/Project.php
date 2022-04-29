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

    public function days(): Collection
    {
        return $this->tasks->mapToGroups(function ($item, $key){
            return [$item->schedule_date => $item];
        });
    }

    public function sortedDays(): array{
        return $this->days()->sortKeys()->toArray();
    }

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
