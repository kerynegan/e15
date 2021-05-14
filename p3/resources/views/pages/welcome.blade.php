@extends('layouts/main')

@section('title')
Welcome Page
@endsection

@section('head')
@endsection

@section('header')

@endsection

@section('content')
@if(Auth::user())
<h2 dusk='auth-heading'> Hello {{ Auth::user()->first_name }}! </h2>
Welcome to your course proposal tool.<br /><br />

If you have <strong>previously taught courses at HESWEB University,</strong><br />
you can view those courses and repropose for this year from <a href="/courses">View My Courses.</a><br /><br />

If you have <strong>never taught a course at HESWEB University,</strong> <br />
or if you want to <strong>propose a new course</strong><br />
please choose <a href="/proposals/create">Propose New Course</a>.<br /><br />

To <strong>view your existing proposals</strong> from this year,<br />
choose <a href="/proposals">View My Proposals</a>.
@else
<h2 dusk='unauth-heading'> Hello! </h2>
This site is for registered users only. <br />
<strong>Would you like to<a href="/login"> log in</a> or <a href="/register">register?</a></strong>
@endif
<br /> <br /> 
@endsection
