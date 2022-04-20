@extends('layouts.dashboard')
@section('leftPanel')
    @include('partials.navigation',['user' => $user, 'projects' => $projects])
@endsection

@section('topPanel')
    @include('partials.projectHeader',['project' => $project])
@endsection

@section('calendarPanel')
    @include('partials.weekCalendar')
@endsection

@section('mainPanel')
    @include('partials.project', ['project' => $project])
@endsection

@section('rightPanel')
    @include('partials.members')
@endsection
