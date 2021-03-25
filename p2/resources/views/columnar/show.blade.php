@extends('layouts/main')

@section('title')
Columnar Ciphers
@endsection

@section('head')
<link href='/css/columnar/show.css' rel='stylesheet'>
@endsection

@section('header')
@endsection

@section('content')
<div class='centered'>
    <h1>Columnar Ciphers</h1>
    <h2>What is a columnar cipher?</h2>
    <p>A typical columnar cipher lays out a keyword as the heading row of a table, one letter to one column.</p>
    <!--INSERT IMG here-->
    <p>The message to be encoded is written horizontally letter-by-letter into the table cells, with any remaining columns filled in with random letters.</p>
    <!--INSERT IMG here-->
    <p>The columns are then rearranged so as to place the keyword in alphabetical order</p>
    <!--INSERT IMG here-->
    <p>and then the message is written back by reading the columns top to bottom.</p>
    <!--INSERT IMG here-->
    <h2>Variations</h2>
    <p>Ciphers like this can be altered in any number of ways, so long as the Messenger and the Recipient both know how to encode/decode the message. Examples of variations can include:</p>
    <ul>
        <li>reversing the alpha order in which the columns are rearranged (A->26, Z->1),</li>
        <li>keeping special characters such as spaces and apostrophes intact,</li>
        <li>encoding the message by writing the letters to the table from right to left, or</li>
        <li>writing back the encoded message by reading the columns bottom to top.</li>
    </ul>
    <h2>Ready to encode your message?</h2>

    <form method='GET' action='/columnar/create' id='columnarform'>
        <div class='details'>* Required fields</div>

        <label for='keyword'>* Keyword (max 15 characters)</label>
        <input type='text' name='keyword' id='keyword' value='{{ old('keyword') }}'><br />

        <label for='message'>* Message (minimum 20 characters)</label>
        <textarea name='message' id='message' value='{{ old('message') }}'></textarea><br />

        <label for='alphaorder'>Reverse the alpha order for the columns so that Z is first and A is last?</label>
        <input type='checkbox' value='true' name='alphaorder' id='alphaorder'><br />

        <label for='specialcharacters'>Keep special characters such as spaces and apostrophes intact?</label>
        <input type='checkbox' value='true' name='specialcharacters' id='specialcharacters'><br />

        <div class='details'>Encode by sorting left to right, or right to left?</div>
        <label for='left'>Left to Right</label>
        <input type='radio' name='sortlr' id='left' value='left' {{(old('sortlr') == 'left') ? 'checked' : ''}} >
        <label for='left'>Right to Left</label>
        <input type='radio' name='sortlr' id='right' value='right' {{(old('sortlr') == 'right') ? 'checked' : ''}} ><br />

        <div class='details'>Write back message by sorting top to bottom, or bottom to top?</div>
        <label for='top'>Top to Bottom</label>
        <input type='radio' name='sorttb' id='top' value='top' {{(old('sorttb') == 'top') ? 'checked' : ''}} >
        <label for='left'>Bottom to Top</label>
        <input type='radio' name='sorttb' id='bottom' value='bottom' {{(old('sorttb') == 'bottom') ? 'checked' : ''}} ><br />

        <input type='submit' class='btn btn-primary' value='Submit'>
    </form>

{{-- 
@if(count($errors) > 0)
    <ul class='alert'>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif --}}

@if(!is_null($keyword))
    <div class='results alert alert-primary'>



        {{-- {{ count($searchResults) }} 
        {{ Str::plural('Result', count($searchResults)) }}: --}}

        {{-- <ul>
            @foreach($formData as $key => $value)
            <li>{{ $key }}: {{ $value }}</li>
            @endforeach
        </ul> --}}
        {{-- <table>
            <tr>
                @foreach($keyword as $key => $value)
                <th> {{$value}}</th>     
                @endforeach
            </tr>
        </table> --}}

        <p>{{ $keyword }}</p>
        <p>{{ $message }}</p>
        <p>{{ $alphaorder }}</p>
        <p>{{ $specialcharacters }}</p>
        <p>{{ $sortlr }}</p>
        <p>{{ $sorttb }}</p>
        {{-- <p>{{ $encodedarray}}</p> --}}
        <ol>
        @foreach($msgarray as $key => $value)
        <li>{{ $key }}: {{ $value }}</li>
        @endforeach
        </ol>
        <ol>
        @foreach($encodedarray as $key => $value)
        <li>{{ $key }}: {{ $value }}</li>
        @endforeach
        </ol>

    </div>
@endif
</div>
@endsection
