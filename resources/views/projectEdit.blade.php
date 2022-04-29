@extends('layouts.master')

@section('title', 'Edit Project')
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

@endsection
@section('content')
    <div class="flex-column taskForm center-content">
        <div class="flex-column">
            <h2>Редактировать проект</h2>
        </div>
        <form action="{{route('project.update',['project' => $project->id])}}" method="post">
            @csrf
            @method('put')
            <p class="flex-column">
                <input type="text" id="name" placeholder="{{$project->name}}" name="name">
            </p>
            <p class="center-content"><input type="submit" value="Подтвердить"></p>
        </form>
    </div>
@endsection
