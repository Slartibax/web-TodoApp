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

    protected $fillable = ['project_name'];
    protected $guarded = ['id', 'owner_id', 'created_at', 'updated_at'];


    public function getTasks(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Task::query()->where('project_id',$this->id)->get();
    }

    public function getDays(): Collection
    {
        //TODO Сделать проверки на существование нужных полей модели
        $tasks = $this->getTasks();
        return $tasks->mapToGroups(function ($item, $key){
            return [$item->schedule_date => $item];
        });
    }

    public function getSortedDays(){
        return $this->getDays()->sortKeys()->toArray();
    }
}
