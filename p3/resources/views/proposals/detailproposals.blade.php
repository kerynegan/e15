@extends('layouts/main')

@section('title')
Detail Proposals Page
@endsection

@section('head')
@endsection

@section('header')
@endsection

@section('content')

@if(!$proposal)
    <h1>Proposal Not Found.</h1>
    <p>Proposal not found. Please return to <a href="/courses">View Your Courses.</a><br />
    Or, if you prefer, you can <a href="/proposals/create">propose a new course.</a><br /><br />
    
    If you believe this is an error, please contact the Registrar's Office at <a href="mailto:registrar@hesweb.edu">registrar@hesweb.edu</a> or at 617-555-1212.</p>

@elseif($proposal)
    <div class='proposal-details' dusk='proposal-details'>
        @if($proposal->subject_code)
            <h1>{{ucfirst($proposal->proposed_term)}} Term: {{$proposal->subject_code}} {{$proposal->college_code}}{{$proposal->number}}</h1>
        @else
            <h1>{{$proposal->proposed_term}}: New Course</h1>
        @endif
        <h2>{{$proposal->proposed_title}}</h2>
        @if($proposal->previous_term_code)
        <p class='last-taught' dusk='last-taught'>Last taught in: {{$proposal->previous_term_code}} as CRN: {{$proposal->previous_crn}}</p>
        @endif


        @if($proposal->previous_format)
            <p class='previous-format' dusk='previous-format'>Previous Format: {{$proposal->previous_format}}</p>
        @endif
        <p class='format' dusk='format'>Proposed Format: {{$proposal->proposed_format}}</p>
       
        @if($proposal->previous_description)
            <p><strong>Previous Course Description:</strong> {{$proposal->previous_description}}</p>  
        @endif      
        <p><strong>Course Description:</strong> {{$proposal->proposed_description}}</p>
        
        @if($proposal->previous_prerequisite)
            <p><strong>Previous Pre-Requisite:</strong> {{$proposal->previous_prerequisite}}</p>  
        @endif      
        <p><strong>Proposed Pre-Requisite:</strong> {{$proposal->proposed_prerequisite}}</p>
        
        @if($proposal->previous_note)
            <p><strong>Previous Course Notes:</strong> {{$proposal->previous_note}}</p>  
        @endif      
        <p><strong>Proposed Course Notes:</strong> {{$proposal->proposed_note}}</p>
        
        @if($proposal->previous_section_note)
            <p><strong>Previous Section Notes:</strong> {{$proposal->previous_section_note}}</p>  
        @endif      
        <p><strong>Proposed Section Notes:</strong> {{$proposal->proposed_section_note}}</p>
        <p><strong>Instructor Comments:</strong> {{$proposal->proposed_comment}}</p>
    </div>

@endif
@endsection