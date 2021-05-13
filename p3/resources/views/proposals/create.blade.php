@extends('layouts/main')

@section('title')
Create new proposal
@endsection

@section('head')
@endsection

@section('header')
@endsection

@section('content')
<h1>Propose a Course</h1>

{{-- @if(!$course) --}}
    <p>Did you mean to repropose a course you've taught before? Go to <a href="/courses">View My Courses</a> to repropose an existing course, or continue on to propose a new course.</p>
{{-- @elseif($course) --}}
    <p>If you prefer to propose a new course instead, please start again</a>.</p>
{{-- @endif --}}

<form method='POST' action='/proposals/create'  >
    {{ csrf_field() }}  
{{-- 
    @if($course->subject_code)
        <label for='course'><strong>Course:</strong></label><br />
        <input type='text' name='course' id='course' value='{{ $course->subject_code }} {{ $course->college_code }}{{ $course->number }}' readonly><br />
    @endif
    @if($course->title)
        <label for='title'><strong>Title:</strong></label><br />
        <textarea name='title' id='title' rows="2" cols="40" value='' readonly>{{ $course->title }}</textarea><br />
    @endif --}}
 <br />
    {{-- @if(!$course) --}}
        <label for='proposed_title'><strong>Proposed Title:</strong></label><br />
    {{-- @else --}}
        {{-- <label for='proposed_title'><strong>Revised Title:</strong></label><br /> --}}
        <textarea name='proposed_title' id='proposed_title' rows="2" cols="40" value='' ></textarea><br />
        @include('includes/error-field', ['fieldName' => 'proposed_title'])
    {{-- @endif --}}
<br />
    {{-- @if($course->term_code)
        <label for='term_code'><strong>Last taught in:</strong></label><br />
        <input type='text' name='term_code' id='term_code' value='{{ $course->term_code }}' readonly><br /><br />
    @endif --}}
        <div class='details'><strong>In which term do you want to teach?</strong></div>
        <input type='radio' name='proposed_term' id='fall' value='fall' >
        <label for='fall'>Fall Term</label>
        <input type='radio' name='proposed_term' id='spring' value='spring' >
        <label for='spring'>Spring Term</label><br />
                @include('includes/error-field', ['fieldName' => 'proposed_term'])
<br />
    {{-- @if($course->format)
        <label for='format'><strong>Previous Format:</strong></label><br />
        <input type='text' name='format' id='format' value='{{ $course->format }}' readonly><br /><br />
    @endif --}}
        <div class='details'><strong>In which format do you want to teach?</strong></div>
        <input type='radio' name='proposed_format' id='harvard-course' value='harvard-course' >
        <label for='harvard-course'>Harvard course</label><br />
        <input type='radio' name='proposed_format' id='live-conference' value='live-conference' >
        <label for='live-conference'>Live web conference</label><br />
        <input type='radio' name='proposed_format' id='replay' value='replay' >
        <label for='replay'>Replay</label><br />
        <input type='radio' name='proposed_format' id='pre-developed' value='pre-developed' >
        <label for='pre-developed'>Pre-Developed</label><br />
        <input type='radio' name='proposed_format' id='flex-conference' value='flex-conference' >
        <label for='flex-conference'>Live or on-demand web conference</label><br />
        <input type='radio' name='proposed_format' id='tutorial' value='tutorial' >
        <label for='tutorial'>Tutorial</label><br />  
                @include('includes/error-field', ['fieldName' => 'proposed_format'])      
<br />
    {{-- previous description  --}}
    {{-- @if($course->description)
        <label for='course-description'><strong>Previous Description:</strong> </label><br />
        <textarea name='course-description' id='course-description' rows="7" cols="60" value='' readonly>{{ $course->description }}</textarea><br />
    @endif --}}
    {{-- proposed  description  --}}
    {{-- @if(!$course) --}}
        <label for='proposed_course_description'><strong>Course Description:</strong></label><br />
    {{-- @else --}}
        {{-- <label for='proposed_course_description'><strong>Revised Course Description:</strong></label><br />
    @endif --}}
        <textarea name='proposed_course_description' id='proposed_course_description' rows="7" cols="60" value=''></textarea><br />
                @include('includes/error-field', ['fieldName' => 'proposed_course_description'])

<br />

    {{-- previous prereqs  --}}
    {{-- @if($course->prerequisite)
      <label for='prerequisite'><strong>Previous Prerequisites:</strong></label><br />
        <textarea name='prerequisite' id='prerequisite' rows="7" cols="60" value='' readonly>{{ $course->prerequisite }}</textarea><br />
    @endif --}}

    {{-- proposed  prereqs  --}}
    {{-- @if(!$course) --}}
        <label for='proposed_prerequisite'><strong>Prerequisites:</strong></label><br />
    {{-- @else
        <label for='proposed_prerequisite'><strong>Revised Prerequisites:</strong></label><br />
    @endif --}}
        <textarea name='proposed_prerequisite' id='proposed_prerequisite' rows="7" cols="60" value=''></textarea><br />
        @include('includes/error-field', ['fieldName' => 'proposed_prerequisite'])
<br />
    {{-- previous course note - readonly --}}
    {{-- @if($course->note)
        <label for='note'><strong>Previous Course Notes:</strong></label><br />
        <textarea name='note' id='note' rows="7" cols="60" value='' readonly>{{ $course->note }}</textarea><br />
    @endif --}}

    {{-- proposed course note  --}}
    {{-- @if(!$course) --}}
        <label for='proposed_note'><strong>Course Notes:</strong></label><br />
    {{-- @else
        <label for='proposed_note'><strong>Revised Course Notes:</strong></label><br />
    @endif --}}
        <textarea name='proposed_note' id='proposed_note' rows="7" cols="60" value=''></textarea><br />
                @include('includes/error-field', ['fieldName' => 'proposed_note'])
<br />
    {{-- previous section note - readonly
    @if($course->section_note)
        <label for='section_note'><strong>Previous Section Notes:</strong></label><br />
        <textarea name='section_note' id='section_note' rows="7" cols="60" value='' readonly>{{ $course->section_note }}</textarea><br />
    @endif --}}

    {{-- proposed section note --}}
    {{-- @if(!$course) --}}
        <label for='proposed_section_note'><strong>Section Notes:</strong></label><br />
    {{-- @else
        <label for='proposed_section_note'><strong>Revised Section Notes:</strong></label><br />
    @endif --}}
        <textarea name='proposed_section_note' id='proposed_section_note' rows="7" cols="60" value=''></textarea><br />
                @include('includes/error-field', ['fieldName' => 'proposed_section_note'])
<br />
    {{-- proposed comment  --}}
        <label for='proposed_comment'><strong>Instructor Comments:</strong></label><br />
        <textarea name='proposed_comment' id='proposed_comment' rows="7" cols="60" value=''></textarea><br />
                @include('includes/error-field', ['fieldName' => 'proposed_comment'])

    <button type='submit' dusk='add-proposal-button' class='btn btn-primary'>Propose this course</button>
 
    @if(count($errors) > 0)
    <div class='alert alert-danger'>
        Please correct the above errors.
    </div>
    @endif
</form>
@endsection