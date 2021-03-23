@extends('layouts/main')

@section('title')
Project 2
@endsection

@section('head')
<link href='/css/cipher/show.css' rel='stylesheet'>
@endsection

@section('header')
<a href='/' alt='Return home'><img src='/images/logo.png' alt='Logo'></a>
@endsection

@section('content')
<div class='centered'>
    <h2>The Alliance of Codebreakers welcomes you</h2>
    <p>Your first steps towards membership lies within these pages.</p>
    <h3>Explore.  Study.  Learn.</h3>
    <p>And when you are ready, you will know how to contact us.</p>
    <h2>Columnar Ciphers</h2>
    <h3>What is a columnar cipher?</h3>
    <p>A typical columnar cipher lays out a keyword as the heading row of a table, one letter to one column.</p>
    <!--INSERT IMG here-->
    <p>The message to be encoded is written horizontally letter-by-letter into the table cells, with any remaining columns filled in with random letters.</p>
    <!--INSERT IMG here-->
    <p>The columns are then rearranged so as to place the keyword in alphabetical order</p>
    <!--INSERT IMG here-->
    <p>and then the message is written back by reading the columns top to bottom.</p>
    <!--INSERT IMG here-->
    <h3>Variations</h3>
    <p>Ciphers like this can be altered in any number of ways, so long as the Messenger and the Recipient both know how to encode/decode the message. Examples of variations can include:</p>
    <ul>
        <li>reversing the alpha order in which the columns are rearranged (A->26, Z->1),</li>
        <li>keeping special characters such as spaces and apostrophes intact,</li>
        <li>encoding the message by writing the letters to the table from right to left, or</li>
        <li>writing back the encoded message by reading the columns bottom to top.</li>
    </ul>
    <h3>Ready to encode your message?</h3>

    <form method='POST' action='/' id='columnarform'>
        <div class='details'>* Required fields</div>
        {{ csrf_field() }}

        <label for='keyword'>* Keyword (max 15 characters)</label>
        <input type='text' name='keyword' id='keyword' value='{{ old('keyword') }}'><br />

        <label for='message'>* Message (minimum 20 characters)</label>
        <textarea name='message' id='message' value='{{ old('message') }}'></textarea><br />

        <label for='alphaorder'>Reverse the alpha order for the columns so that Z is first and A is last?</label>
        <input type='checkbox' value='yes' name='alphaorder' id='alphaorder'><br />

        <label for='specialcharacters'>Keep special characters such as spaces and apostrophes intact?</label>
        <input type='checkbox' value='yes' name='specialcharacters' id='specialcharacters'><br />

        <div class='details'>Encode by sorting left to right, or right to left?</div>
        <label for='left'>Left to Right</label>
        <input type='radio' name='sortLR' id='left' value='left' {{(old('sortLR') == 'left') ? 'checked' : ''}} >
        <label for='left'>Left to Right</label>
        <input type='radio' name='sortLR' id='right' value='right' {{(old('sortLR') == 'right') ? 'checked' : ''}} ><br />

        <div class='details'>Write back message by sorting top to bottom, or bottom to top?</div>
        <label for='top'>Top to Bottom</label>
        <input type='radio' name='sortTB' id='top' value='top' {{(old('sortTB') == 'top') ? 'checked' : ''}} >
        <label for='left'>Left to Right</label>
        <input type='radio' name='sortTB' id='bottom' value='bottom' {{(old('sortTB') == 'bottom') ? 'checked' : ''}} ><br />

        <input type='submit' class='btn btn-primary' value='Submit'>
    </form>
</div>
{{-- 
@if(count($errors) > 0)
    <ul class='alert'>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

</form>
@if(!is_null($searchResults))
    @if(count($searchResults) == 0)
        <div class='results alert alert-warning'>
            No results found.
        </div>
    @else
        <div class='results alert alert-primary'>

           {{ count($searchResults) }} 
           {{ Str::plural('Result', count($searchResults)) }}:

            <ul>
                @foreach($searchResults as $slug => $book)
                <li><a href='/books/{{ $slug }}'> {{ $book['title']   }}</a></li>
                @endforeach
            </ul>
        </div>
    @endif
@endif --}}
@endsection
