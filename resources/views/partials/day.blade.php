<div class="Day dayShader"><!--Основной блок-->
    <div class="dayDateBlock dayShader"><!--Блок даты-->
        <h id="{{date('l', strtotime($day['date']))}}"></h>
        {{date('l  d-m-Y', strtotime($day['date']))}}
        <h id="{{$day['date']}}"></h>
    </div>
    <div class="dayListBlock dayShader" style="margin-bottom: 10px"><!--Блок списка-->
        @each('partials.task',$day['tasks'],'task')
    </div>
{{--    <div class="center-content"><!--Блок кнопки-->--}}
{{--        <label class="dayAddButtonBlock icon iconAddTask" for="modal-1" id="addTask-{{$day['date']}}"> </label>--}}
{{--        <input class="dayAddButtonBlock icon iconAddTask" type="button" id="addTask-{{$day['date']}}">--}}
{{--    </div>--}}
</div>
