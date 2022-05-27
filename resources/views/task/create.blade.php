@extends('layouts.master')

@section('title', 'Create Task')
@section('styles')
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

    <script src="https://cdn.jsdelivr.net/npm/thedatepicker@latest/dist/the-datepicker.min.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/thedatepicker@latest/dist/the-datepicker.css">
@endsection
@section('content')
    <div class="flex-column taskForm center-content">
        <div class="flex-column">
            <h2>Создать новую задачу</h2>
        </div>
        <form action="{{route('project.task.store',['project'=> back()->getRequest()->project])}}" method="post">
            @csrf
            <p class="flex-column">
                <input type="text" id="name" placeholder="Название задачи" name="name">
            </p>
            <p  class="flex-column">
                <input type="text" id="description" placeholder="Описание задачи" name="description">
            </p>
            <p  class="flex-column">
                <input type="text" id="date" placeholder="Дата" name="schedule_date">
            </p>
            <p class="center-content"><input type="submit" value="Создать задачу"></p>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        const input = document.getElementById('date');
        const datepicker = new TheDatepicker.Datepicker(input);
        datepicker.options.setMinDate('today')
        datepicker.options.setInputFormat("Y-m-d");
        datepicker.options.setDaysOutOfMonthVisible(true);
        datepicker.options.setMonthAsDropdown(false);
        datepicker.render();
    </script>
@endsection
