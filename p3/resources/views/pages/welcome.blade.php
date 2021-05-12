@extends('layouts/main')

@section('title')
Welcome Page
@endsection

@section('head')
@endsection

@section('header')

@if(Auth::user())
<h2>
    Hello {{ Auth::user()->first_name }}!
</h2>
@else
<h2> Hello! </h2>
<a href="/login"> Would you like to log in?</a>
@endif


@endsection

@section('content')
Some Content here.
@endsection
