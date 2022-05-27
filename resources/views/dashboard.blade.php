@extends('layouts.dashboard')

@section('leftPanel')
    @include('partials.navigation',['user' => $data['user'], 'projects' => $data['options']])
@endsection

@section('topPanel')
    @include('partials.projectHeader',['project' => $data['project']['head']])
@endsection

@section('calendarPanel')
    @include('partials.weekCalendar')
@endsection

@section('createTaskButton')
{{--    <label id="createTask" for="modal-1" href="{{route('project.task.create',['project' => $data['project']['head']->id])}}" class="icon iconAddTask createTaskButton"></label>--}}
    <label id="createTask" for="project.task.create" class="icon iconAddTask createTaskButton">
        <a id="project.task.create" href="{{route('project.task.create',['project' => $data['project']['head']->id])}}" class="createTaskButton"></a>
    </label>

{{--    <button id="createTask btn" for="modal-1" class="icon iconAddTask createTaskButton"></button>--}}
@endsection

@section('mainPanel')
    @include('partials.project', ['project' => $data['project']])
@endsection

@section('rightPanel')
    @include('partials.members',['members' => $data['members']])
@endsection

