<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class User_Project extends Pivot
{
    protected $table = 'users_projects';

    public static function getOptionsForUser(User $user){
        $options = User_Project::query()->select(['project_id'])->where('user_id',$user->id)->get()->pluck('project_id');
        return Project::query()->whereIn('id',$options)->get();
    }

    public static function getMembersForProject(Project $project){
        $members = User_Project::query()->select(['user_id'])->where('project_id',$project->id)->get()->pluck('user_id');
        return User::query()->whereIn('id',$members)->get();
    }
}
