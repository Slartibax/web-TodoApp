<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>{{$task->name}}</title>
    <link type="text/css" rel="stylesheet" href="{{asset('css/mainStyles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/calendarStyles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/dayStyles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/headerStyles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/iconStyles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/membersStyles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/shadersStyles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/taskStyles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/taskWindowStyles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/navigationStyles.css')}}">
</head>
<body class="center-content">
<div class="flex-column dayWindow dayShader "><!--Индивидуальное окно задачи-->
    <div class="flex-row dayWindowNameBlock"> <!--Чекбокс и название-->
        <div class="center-content"><!--Чекбокс-->
            <input class="check" type="checkbox">
        </div>
        <div class="center-content"><!--Название-->
            <a class="dayWindowNameClick round "><label>{{$task->name}}</label></a>
        </div>
    </div>
    <div class="flex-row"> <!--Дата и кнопки-->
        <div class="center-content dayWindowDateBlock round"><!-- Дата -->
            <a class="dayWindowDateClick round dayShader"><label >{{$task->schedule_date}}</label></a>
        </div>
        <div class="flex-row dayWindowButtonsBlock"><!--Блок кнопок-->
            <div class="center-content"><!-- Кнопка переноса -->
                <input class="round icon iconSchedule" type="button">
            </div>
            <div class="center-content"><!-- Кнопка удалить -->
                <form method="post" action="">
                    @method('delete')
                    @csrf
                    <button id="{{$task->id}}-delete" class="inputElement icon iconTrash round" type="submit"></button>
                </form>
            </div>
            <div class="center-content"><!-- Кнопка дополнительно -->
                <input class="round icon iconMore" type="button">
            </div>
        </div>
    </div>
    <div class="round dayWindowDescriptionBlock descriptionShader"><!--Описание задачи-->
        <a class="round dayWindowDescriptionClick">
            {{$task->description}}
           </a>
    </div>
    <div class="flex-column round"><!--Список подзадач-->
        <div class="flex-column"><!--Кнопка добавить задачу-->
            <input class="round icon iconAddTask" type="button">
        </div>
    </div>
</div>
</body>
</html>
