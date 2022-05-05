<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function view(User $user, Task $task): bool
    {
        return $task->project->members()->get()->contains($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        $project = Project::query()->find(\request()->project);
        return $project->members()->get()->contains($user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function update(User $user, Task $task): bool
    {
        return $task->project->members()->get()->contains($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function delete(User $user, Task $task): bool
    {
        return $task->project->members()->get()->contains($user);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function restore(User $user, Task $task): bool
    {
        return $task->project->members()->get()->contains($user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function forceDelete(User $user, Task $task): bool
    {
        return $task->project->members()->get()->contains($user);
    }
}
