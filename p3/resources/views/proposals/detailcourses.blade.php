@extends('layouts/main')

@section('title')
Show Detailed Courses Page
@endsection

@section('head')
@endsection

@section('header')
@endsection

@section('content')

@if(!$course)
    <h1>Course Not Found.</h1>
    <p>Course not found. Please return to <a href="/courses">View Your Courses.</a><br />
    Or, if you prefer, you can <a href="/proposals/create">propose a new course.</a><br /><br />
    
    If you believe this is an error, please contact the Registrar's Office at <a href="mailto:registrar@hesweb.edu">registrar@hesweb.edu</a> or at 617-555-1212.</p>

@elseif($course)
    <div class='course-details' dusk='course-details'>
        <h1>{{$course->subject_code}} {{$course->college_code}}{{$course->number}}</h1>
        <h2>{{$course->title}}</h2>
        <p class='last-taught' dusk='last-taught'>Last taught in: {{$course->term_code}} as CRN: {{$course->crn}}</p>
        <p class='format' dusk='format'>Format: {{$course->format}}</p>
        <p><strong>Course Description:</strong> {{$course->description}}</p>
        @if($course->prerequisite)
        <p><strong>Pre-requisites:</strong> {{$course->prerequisite}}</p>
        @endif
        @if($course->note)
        <p><strong>Course Notes:</strong> {{$course->note}}</p>
        @endif
        @if($course->section_note)
        <p><strong>Section Notes:</strong> {{$course->section_note}}</p>
        @endif
    </div>
    <p class='repropose-ask'>Would you like to repropose this course?</p>
    <a href='/courses/{{$course->id}}/repropose'><button>Repropose {{$course->subject_code}} {{$course->college_code}}{{$course->number}}</button></a> 
@endif
@endsection
