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
    <p>Proposal not found. Please return to <a href="/proposals/admin">View all Proposals.</a></p>

@elseif($proposal)
    <div class='proposal-admin-details' dusk='proposal-admin-details'>
        @if($proposal->subject_code)
            <h1>{{$proposal->subject_code}} {{$proposal->college_code}}{{$proposal->number}} - {{$first_name}} {{$last_name}}</h1>
        @else
            <h1>New Course - {{$first_name}} {{$last_name}}</h1>
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

        <p><strong>Proposed by:</strong> {{$first_name}} {{$last_name}} <strong>E-mail Address: </strong><a href='mailto:{{$email}}'>{{$email}}</a></p>

    </div>

@endif
@endsection