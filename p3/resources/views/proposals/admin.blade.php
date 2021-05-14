@extends('layouts/main')

@section('title')
Show Proposals Page
@endsection

@section('head')
@endsection

@section('header')
@endsection

@section('content')
<h1>View all Proposals</h1>

@if(!$proposals)
    <p>No proposals found.</p>
@elseif($proposals)
    <div class='all-proposals' dusk='all-proposals'>
        <table class='original'>
            <tr>
                <th>Term</th>
                <th>Course (if reproposal)</th>
                <th>Proposed title</th>
            </tr>
            @foreach($proposals as $proposal)            
            <tr>
                <td>{{$proposal->proposed_term}}</td>
                <td><a href='/proposals/{{$proposal->id}}/admin'>
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
    </div>
@endif


@endsection
