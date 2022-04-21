<div class="Task">
    <div class="TaskNameAndChk">
        <div>
            <input class="check" type="checkbox">
        </div>
        <div class="taskName round chkShader">
            <a class="round" id="{{$task['id']}}" href="">{{$task['task_name']}}</a>
        </div>
    </div>
    <div class="TaskControls">
        <div class="center-content">
            <input class="round icon iconEdit" type="button" id="{{$task['id']}}-Edit">
        </div>
        <div class="center-content">
            <input class="round icon iconSchedule" type="button" id="{{$task['id']}}-Schedule">
        </div>
        <div class="center-content">
            <input class="round icon iconMore" type="button" id="{{$task['id']}}-More">
        </div>
    </div>
</div>
