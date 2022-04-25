@extends('layouts.master')
@section('title','web-Todo')
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

@section('modal')
    <input class="modal-state" id="modal-1" type="checkbox" />
    <div class="modal">
        <label class="modal__bg" for="modal-1"></label>
        <div class="modal__inner">
            <label class="modal__close" for="modal-1"></label>
            @include('partials.taskForm')
        </div>
    </div>
@endsection
@section('content')
        <div class="flexBody mainBackground">
            <div class="leftPanel round leftPanelShader ">
                @yield('leftPanel')
            </div>
            <div class="middlePanel round">
                <div class="topPanel round topPanelShader">
                    @yield('topPanel')
                </div>
                <div class="mainPanel round mainPanelShader">
                    <div class="calendarPanel"> <!-- calendar-->
                        @yield('calendarPanel')
                    </div>
                    <div class="createTaskButtonPanel dayShader">
                        <label id="createTask" for="modal-1" class="icon iconAddTask createTaskButton btn"></label>
{{--                        <button id="createTask btn" for="modal-1" class="icon iconAddTask createTaskButton"></button>--}}
                    </div>
                    <div> <!-- TaskList -->
                        @yield('mainPanel')
                    </div>
                </div>
            </div>
            <div class="rightPanel round rightPanelShader">
                @yield('rightPanel')
            </div>
        </div>
@endsection

