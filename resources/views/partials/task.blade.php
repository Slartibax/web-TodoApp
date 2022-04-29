<div class="Task">
    <div class="TaskNameAndChk">
        <div>
            <input class="check" type="checkbox">
        </div>
        <div class="taskName round chkShader">
            <a class="round" id="{{$task['id']}}" href="{{route('task.show',['project' => $task['project_id'],'task' => $task['id']])}}">{{$task['name']}}</a>
        </div>
    </div>
    <div class="TaskControls">
        <div class="center-content">
            <a class="round icon iconEdit" href="{{route('task.edit',['project' => $task['project_id'],'task' => $task['id']])}}" type="button" id="{{$task['id']}}-Edit"></a>
        </div>
        <div class="center-content">
            <input class="round icon iconSchedule" type="button" id="{{$task['id']}}-Schedule">
        </div>
        <div class="center-content">
            <input class="round icon iconMore" type="button" id="{{$task['id']}}-More">
        </div>
    </div>
</div>
