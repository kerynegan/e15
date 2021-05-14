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

    <p>Did you mean to repropose a course you've taught before? <br />Go to <strong><a href="/courses">View My Courses</a></strong> to repropose an existing course.</p>

<form method='POST' action='/proposals/create'  >
    {{ csrf_field() }}  
     
    @if(count($errors) > 0)
    <div class='alert alert-danger error'>
        Please correct the below errors.
    </div>
    @endif

 <br />

        <label for='proposed_title'><strong>Proposed Title:</strong></label><br />
        <textarea name='proposed_title' id='proposed_title' rows="2" cols="40" value='' >{{ old("proposed_title") }}</textarea><br />
        @include('includes/error-field', ['fieldName' => 'proposed_title']) 
<br />
        <div class='details'><strong>In which term do you want to teach?</strong></div>
        <input type='radio' name='proposed_term' id='fall' value='fall' {{(old('proposed_term') == 'fall') ? 'checked' : ''}}>
        <label for='fall'>Fall Term</label>
        <input type='radio' name='proposed_term' id='spring' value='spring' {{(old('proposed_term') == 'spring') ? 'checked' : ''}}>
        <label for='spring'>Spring Term</label><br />
                @include('includes/error-field', ['fieldName' => 'proposed_term'])
<br />
        <div class='details'><strong>In which format do you want to teach?</strong></div>
        <input type='radio' name='proposed_format' id='harvard-course' value='Harvard course' {{(old('proposed_format') == 'Harvard course') ? 'checked' : ''}}>
        <label for='harvard-course'>Harvard course</label><br />
        <input type='radio' name='proposed_format' id='live-conference' value='Live web conference' {{(old('proposed_format') == 'Live web conference') ? 'checked' : ''}}>
        <label for='live-conference'>Live web conference</label><br />
        <input type='radio' name='proposed_format' id='replay' value='Replay' {{(old('proposed_format') == 'Replay') ? 'checked' : ''}}>
        <label for='replay'>Replay</label><br />
        <input type='radio' name='proposed_format' id='pre-developed' value='Pre-Developed' {{(old('proposed_format') == 'Pre-Developed') ? 'checked' : ''}}>
        <label for='pre-developed'>Pre-Developed</label><br />
        <input type='radio' name='proposed_format' id='flex-conference' value='Live or on-demand web conference' {{(old('proposed_format') == 'Live or on-demand web conference') ? 'checked' : ''}}>
        <label for='flex-conference'>Live or on-demand web conference</label><br />
        <input type='radio' name='proposed_format' id='tutorial' value='Tutorial' {{(old('proposed_format') == 'Tutorial') ? 'checked' : ''}}>
        <label for='tutorial'>Tutorial</label><br />  
                @include('includes/error-field', ['fieldName' => 'proposed_format'])    
<br />
    
        <label for='proposed_course_description'><strong>Course Description:</strong></label><br />
        <textarea name='proposed_course_description' id='proposed_course_description' rows="7" cols="60" value=''>{{ old("proposed_course_description") }}</textarea><br />
                @include('includes/error-field', ['fieldName' => 'proposed_course_description'])

<br />
        <label for='proposed_prerequisite'><strong>Prerequisites:</strong></label><br />
        <textarea name='proposed_prerequisite' id='proposed_prerequisite' rows="7" cols="60" value=''>{{ old("proposed_prerequisite") }}</textarea><br />
        @include('includes/error-field', ['fieldName' => 'proposed_prerequisite'])
<br />
   
        <label for='proposed_note'><strong>Course Notes:</strong></label><br />
        <textarea name='proposed_note' id='proposed_note' rows="7" cols="60" value=''>{{ old("proposed_note") }}</textarea><br />
        @include('includes/error-field', ['fieldName' => 'proposed_note'])
<br />

        <label for='proposed_section_note'><strong>Section Notes:</strong></label><br />
        <textarea name='proposed_section_note' id='proposed_section_note' rows="7" cols="60" value=''>{{  old("proposed_section_note") }}</textarea><br />
        @include('includes/error-field', ['fieldName' => 'proposed_section_note'])
<br />
        <label for='proposed_comment'><strong>Instructor Comments:</strong></label><br />
        <textarea name='proposed_comment' id='proposed_comment' rows="7" cols="60" value=''>{{  old("proposed_comment") }}</textarea><br />
        @include('includes/error-field', ['fieldName' => 'proposed_comment'])

        <a href="/courses" class='cancel-link' dusk='cancel-link'>Cancel</a>
        <button type='submit' dusk='add-proposal-button' class='btn btn-primary yes'>Propose this course</button>

</form>
@endsection