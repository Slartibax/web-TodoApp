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

@section('mainPanel')
    @include('partials.project', ['project' => $data['project']])
@endsection

@section('rightPanel')
    @include('partials.members',['members' => $data['members']])
@endsection
