@foreach($project['days'] as $date => $tasks)
    @include('partials.day',['day' => ['date' => $date, 'tasks' => $tasks], 'project' => $project['head']])
@endforeach
