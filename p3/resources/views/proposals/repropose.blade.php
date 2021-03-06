@extends('layouts/main')

@section('title')
Repropose a course
@endsection

@section('head')
@endsection

@section('header')
@endsection

@section('content')
<h1>Repropose this course</h1>

@if(!$course)
    <p>Course not found. Please return to <a href="/courses">View Your Courses.</a><br />
    Or, if you prefer, you can <a href="/proposals/create">propose a new course.</a><br /><br />
    
    If you believe this is an error, please contact the Registrar's Office at <a href="mailto:registrar@hesweb.edu">registrar@hesweb.edu</a> or at 617-555-1212.</p>
@elseif($course)
    <p>If you prefer to propose a new course instead, please go to: <br />
    <strong><a href="/proposals/create">Propose a New Course</a></strong></p>

<form method='POST' action='/courses/{{$course->id}}/save'  >
    {{ csrf_field() }}  

    @endif
    @if(count($errors) > 0)
        <div class='alert alert-danger error'>
            Please correct the below errors.
        </div>
    @endif
    @if($course->subject_code)
        <label for='course'><strong>Course:</strong></label><br />
        <input type='text' name='course' id='course' value='{{ $course->subject_code }} {{ $course->college_code }}{{ $course->number }}' readonly><br />
    @endif
    @if($course->title)
        <label for='title'><strong>Title:</strong></label><br />
        <textarea name='title' id='title' dusk='title' rows="2" cols="40" value='' readonly>{{ $course->title }}</textarea><br />
    @endif
 <br />
    @if(!$course)
        <label for='proposed_title'><strong>Proposed Title:</strong></label><br />
    @else
        <label for='proposed_title'><strong>Revised Title:</strong></label><br />
        <textarea name='proposed_title' dusk='proposed_title' id='proposed_title' rows="2" cols="40" value='' > {{ old("proposed_title") ?? $course->title }}</textarea><br />
        @include('includes/error-field', ['fieldName' => 'proposed_title'])
    @endif
<br />
    @if($course->term_code)
        <label for='term_code'><strong>Last taught in:</strong></label><br />
        <input type='text' name='term_code' id='term_code' dusk='term_code' value='{{ $course->term_code }}' readonly><br /><br />
    @endif
        <div class='details'><strong>In which term do you want to teach?</strong></div>
        <input type='radio' name='proposed_term' id='fall' value='fall' {{(old('proposed_term') == 'fall') ? 'checked' : ''}}>
        <label for='fall'>Fall Term</label>
        <input type='radio' name='proposed_term' id='spring' value='spring' {{(old('proposed_term') == 'spring') ? 'checked' : ''}}>
        <label for='spring'>Spring Term</label><br />
                @include('includes/error-field', ['fieldName' => 'proposed_term'])
<br />
    @if($course->format)
        <label for='format'><strong>Previous Format:</strong></label><br />
        <input type='text' name='format' id='format' dusk='format' value='{{ $course->format }}' readonly><br /><br />
    @endif
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
    {{-- previous description  --}}
    @if($course->description)
        <label for='course-description'><strong>Previous Description:</strong> </label><br />
        <textarea name='course-description' id='course-description' dusk='course-description' rows="7" cols="60" value='' readonly>{{ $course->description }}</textarea><br />
    @endif
    {{-- proposed  description  --}}
    @if(!$course)
        <label for='proposed_course_description'><strong>Course Description:</strong></label><br />
    @else
        <label for='proposed_course_description'><strong>Revised Course Description:</strong></label><br />
    @endif
        <textarea name='proposed_course_description' id='proposed_course_description' dusk='proposed_course_description' rows="7" cols="60" value=''>{{ old("proposed_course_description") ?? $course->description }}</textarea><br />
                @include('includes/error-field', ['fieldName' => 'proposed_course_description'])

<br />

    {{-- previous prereqs  --}}
    @if($course->prerequisite)
      <label for='prerequisite'><strong>Previous Prerequisites:</strong></label><br />
        <textarea name='prerequisite' id='prerequisite' dusk='prerequisite' rows="7" cols="60" value='' readonly>{{ $course->prerequisite }}</textarea><br />
    @endif

    {{-- proposed  prereqs  --}}
    @if(!$course)
        <label for='proposed_prerequisite'><strong>Prerequisites:</strong></label><br />
    @else
        <label for='proposed_prerequisite'><strong>Revised Prerequisites:</strong></label><br />
    @endif
        <textarea name='proposed_prerequisite' id='proposed_prerequisite' dusk='proposed_prerequisite' rows="7" cols="60" value=''>{{ old("proposed_prerequisite") ?? $course->prerequisite }}</textarea><br />
        @include('includes/error-field', ['fieldName' => 'proposed_prerequisite'])
<br />
    {{-- previous course note - readonly --}}
    @if($course->note)
        <label for='note'><strong>Previous Course Notes:</strong></label><br />
        <textarea name='note' id='note' dusk='note' rows="7" cols="60" value='' readonly>{{ $course->note }}</textarea><br />
    @endif

    {{-- proposed course note  --}}
    @if(!$course)
        <label for='proposed_note'><strong>Course Notes:</strong></label><br />
    @else
        <label for='proposed_note'><strong>Revised Course Notes:</strong></label><br />
    @endif
        <textarea name='proposed_note' id='proposed_note' dusk='proposed_note'rows="7" cols="60" value=''>{{ old("proposed_note") ?? $course->note }}</textarea><br />
                @include('includes/error-field', ['fieldName' => 'proposed_note'])
<br />
    {{-- previous section note - readonly --}}
    @if($course->section_note)
        <label for='section_note'><strong>Previous Section Notes:</strong></label><br />
        <textarea name='section_note' id='section_note' dusk='section_note' rows="7" cols="60" value='' readonly>{{ $course->section_note }}</textarea><br />
    @endif

    {{-- proposed section note --}}
    @if(!$course)
        <label for='proposed_section_note'><strong>Section Notes:</strong></label><br />
    @else
        <label for='proposed_section_note'><strong>Revised Section Notes:</strong></label><br />
    @endif
        <textarea name='proposed_section_note' id='proposed_section_note' dusk='proposed_section_note' rows="7" cols="60" value=''>{{  old("proposed_section_note") ?? $course->section_note }}</textarea><br />
                @include('includes/error-field', ['fieldName' => 'proposed_section_note'])
<br />
    {{-- proposed comment  --}}
        <label for='proposed_comment'><strong>Instructor Comments:</strong></label><br />
        <textarea name='proposed_comment' id='proposed_comment' dusk='proposed_comment' rows="7" cols="60" value=''>{{  old("proposed_comment") }}</textarea><br />
                @include('includes/error-field', ['fieldName' => 'proposed_comment'])

    <a href="/courses" class='cancel-link' dusk='cancel-link'>Cancel</a><br><br>
    <button type='submit' dusk='add-proposal-button' class='btn btn-primary yes'>Propose this course</button>
 

</form>
@endsection