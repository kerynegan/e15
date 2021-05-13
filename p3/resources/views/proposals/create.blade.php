@extends('layouts/main')

@section('title')
Create new proposal
@endsection

@section('head')
@endsection

@section('header')
@endsection

@section('content')
<h1>Propose a Course</h1><br /><br />

@if(!$course)
    Did you mean to repropose a course you've taught before? Go to <a href="/courses">View My Courses</a> to repropose an existing course, or continue on to propose a new course.
@elseif($course)
    If you prefer to propose a new course instead, please start again</a>.
@endif

<form method='POST' action='/proposals/create'  >
        <div class='details'>* Required fields</div>
    
    @if($course) 
        
        <label for='keyword'>* Keyword (letters only, 4-15 characters)</label>
        <input type='text' name='keyword' id='keyword' value='{{ old('keyword'), $keyword }}'>
        <br /><br />
        <label for='message'>* Message (minimum 20 characters; numbers and special characters will be ignored/not encoded)</label>
        <textarea name='message' id='message' rows="4" cols="50" >{{ old('message'), $message }}</textarea>
        <br /><br />
        
        
        <br /><br />

        <input type='submit' class='btn btn-primary' value='Submit'>
    </form>

            $table->unsignedMediumInteger('previous_term_code')->nullable();
            $table->unsignedSmallInteger('previous_crn')->nullable();
            $table->char('subject_code', 4)->nullable();
            $table->char('college_code', 2)->nullable();
            $table->string('number', 7)->nullable();
            $table->foreignId('course_id')->nullable();
            $table->string('previous_schedule_type', 2)->nullable();
            $table->string('previous_format', 60)->nullable();
            $table->string('department_code', 4)->nullable();
            $table->string('previous_title', 135)->nullable();
            $table->text('previous_note')->nullable();
            $table->text('previous_section_note')->nullable();
            $table->text('previous_prerequisite')->nullable();
            $table->text('prevous_description')->nullable();
            $table->enum('proposed_term', ['fall', 'spring']);          
            $table->string('proposed_format', 60);
            $table->string('proposed_title', 135);
            $table->text('proposed_note')->nullable();
            $table->text('proposed_section_note')->nullable();
            $table->text('proposed_prerequisite')->nullable();
            $table->text('proposed_description');
            $table->text('proposed_comment')->nullable();



@endsection
