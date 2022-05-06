<div class="Task">
    <div class="TaskNameAndChk">
        <div class="center-content checkArea">
            <form class="center-content checkArea" action="{{route('task.destroy',['project' => $task['project_id'],'task' => $task['id']])}}" method="post">
                @method('delete')
                @csrf
                <label class="center-content checkArea" for="{{$task['id']}}-complete" type="checkbox"> <a class="icon iconRadioCheck"></a></label>
                <input class="invisible" id="{{$task['id']}}-complete" type="submit">
            </form>
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
