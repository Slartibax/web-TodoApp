<div class="Day dayShader"><!--Основной блок-->
    <div class="dayDateBlock dayShader"><!--Блок даты-->
        {{$day['date']}}
        <h id="{{$day['date']}}"></h>
    </div>
    <div class="dayListBlock dayShader"><!--Блок списка-->
        @each('partials.task',$day['tasks'],'task')
    </div>
    <div class="center-content"><!--Блок кнопки-->
        <label class="dayAddButtonBlock icon iconAddTask" for="modal-1" id="addTask-{{$day['date']}}"> </label>
{{--        <input class="dayAddButtonBlock icon iconAddTask" type="button" id="addTask-{{$day['date']}}">--}}
    </div>
</div>
