@extends('layouts/main')

@section('title')
Deletion Confirmation Page
@endsection

@section('head')
@endsection

@section('header')
@endsection

@section('content')
<h1>Confirm deletion</h1>

<p>Are you sure you want to delete <br /><strong>{{ $proposal->proposed_title }}?</strong> <br />
<br />
<strong>This cannot be undone.</strong</p>

<form method='POST' action='/proposals/{{ $proposal->id }}'>
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <button type='submit' class='btn btn-danger btn-small' dusk='confirm-delete-button'>Yes, delete it!</button>
</form>

<p class='cancel'>
    <a href='/proposals/{{ $proposal->id }}'>No, I changed my mind.</a>
</p>
@endsection
