<?php

namespace App\Http\Views;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class Dashboard implements \Illuminate\Contracts\Support\Responsable
{


    public function __construct(Project $project)
    {
        $this->project=$project;
    }

    public function days(): Collection
    {
        return $this->project->tasks->mapToGroups(function ($item, $key){
            return [$item->schedule_date => $item];
        });
    }

    public function sortedDays(): array{
        return $this->days()->sortKeys()->toArray();
    }

    /**
     * @inheritDoc
     */
    public function toResponse($request)
    {
        $user = User::query()->where('id',Auth::id())->first();

        $personal = $user->projects->filter(function($value, $key) {
            return count($value->members) < 2;
        });
        $shared = $user->projects->filter(function($value, $key) {
            return count($value->members) >= 2;
        });

        $members = $this->project->members;
        $options = ['personal' => $personal, 'shared' => $shared];
        $project = [ 'head' => $this->project, 'days' => $this->sortedDays()];

        $data = ['user' => $user,
            'project' => $project,
            'options' => $options,
            'members' => $members
        ];

        return view('dashboard')->with('data', $data);
    }
}
