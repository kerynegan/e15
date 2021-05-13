@extends('layouts/main')

@section('title')
Show Proposals Page
@endsection

@section('head')
@endsection

@section('header')
@endsection

@section('content')
<h1>My Current Proposals</h1>

@if($proposals->count() == 0)
    <p>You haven't propose any courses this year.<br />
    Would you like to <a href="/proposals/create">propose a new course?</a></p>
@elseif($proposals)
    <div class='my-proposals' dusk='my-proposals'>
        <table class='original'>
            <tr>
                <th>Term</th>
                <th>Course (if reproposal)</th>
                <th>Proposed title</th>
            </tr>
            @foreach($proposals as $proposal)            
            <tr>
                <td>{{$proposal->proposed_term}}</td>
                <td><a href='proposals/{{$proposal->id}}'>
                    @if($proposal->subject_code)
                        {{$proposal->subject_code}} {{$proposal->college_code}}{{$proposal->number}}
                    @else
                        <p>New Course</p>
                    @endif
                </a></td>
                <td>{{$proposal->proposed_title}}</td>
            </tr>
            @endforeach
        </table>
        <br>
        <p>Would you like to <a href="/proposals/create">propose a new course?</a><br />
        Or, if you've taught with HESWEB U before, you can <a href="/courses">repropose a course.</a></p>
    </div>
@endif


@endsection
