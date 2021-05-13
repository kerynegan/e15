@extends('layouts/main')

@section('title')
Show Courses Page
@endsection

@section('head')
@endsection

@section('header')
@endsection

@section('content')
<h1>My Previous Courses</h1>

@if($courses->count() == 0)
    <p>You haven't taught any recent courses.<br />
    Would you like to <a href="/proposals/create">propose a new course?</a></p>
@elseif($courses)
    <div class='my-courses' dusk='my-courses'>
        <p>Choose a course below to see more details and to repropose it for this year.</p>
        <table class='original'>
            <tr>
                <th>Term</th>
                <th>Course</th>
                <th>Title</th>  
            </tr>
            @foreach($courses as $course)            
            <tr>
                <td>{{$course->term_code}}</td>
                <td><a href='courses/{{$course->id}}'>{{$course->subject_code}} {{$course->college_code}}{{$course->number}}</a></td>
                <td>{{$course->title}}</td>
            </tr>
            @endforeach
        </table>
        <br>
        <p>Or, if you prefer, you can <a href="/proposals/create">propose a new course.</a></p>
    </div>
@endif


@endsection
