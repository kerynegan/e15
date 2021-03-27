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
        <div class='info'>
        <h1>Columnar Ciphers</h1>
        <h2>What is a columnar cipher?</h2>
        <p>
        <p>A typical columnar cipher lays out a keyword as the heading row of a table, one letter to one column.</p>
        <img src="/images/codebreaker_05.png" width="75%">
        <p>The message to be encoded is written horizontally letter-by-letter into the table cells, with any remaining columns filled in with random letters.</p>
        <img src="/images/codebreaker_01.png" width="75%">
        <img src="/images/codebreaker_03.png" width="75%">
        <p>The table is then rearranged so as to place the keyword in alphabetical order, with the values from the columns (not the rows) of the original table returning as the output</p>
        <p>It is easier to understand the output by transposing the table, with the keyword in alphabetical order down the lefthand side:</p>
        <img src="/images/codebreaker_04.png" width="75%">
        <p>The resulting encoded message would be:
        <img src="/images/codebreaker_02.png" width="75%">
        <h2>Variations</h2>
        <p>Ciphers like this can be altered in any number of ways, so long as the Messenger and the Recipient both know how to encode/decode the message. Examples of variations can include:</p>
        <ul>
            <li>reversing the alpha order in which the columns are rearranged (A->26, Z->1),</li>
            <li>encoding the message by writing the letters to the table from right to left, or</li>
            <li>writing back the encoded message by reading the columns bottom to top.</li>
        </ul>
    </div>
    <a name="encode"></a>
    <h2>Ready to encode your message?</h2>

    <form method='GET' action='/columnar/create' id='columnarform' >
        <div class='details'>* Required fields</div>

        <label for='keyword'>* Keyword (letters only, 4-15 characters)</label>
        <input type='text' name='keyword' id='keyword' value='{{ old('keyword'), $keyword }}'>
        <br /><br />
        <label for='message'>* Message (minimum 20 characters; numbers and special characters will be ignored/not encoded)</label>
        <textarea name='message' id='message' rows="4" cols="50" >{{ old('message'), $message }}</textarea>
        <br /><br />
        <input type='checkbox' value='true' name='alphaorder' id='alphaorder' {{ old('alphaorder') == 'true' ? 'checked' : ''}}>
        <label for='alphaorder'>Reverse the alpha order for the columns so that Z is first and A is last?</label>
        <br /><br />
        <div class='details'>*Encode by sorting left to right, or right to left?</div>
        <input type='radio' name='sortlr' id='left' value='left' {{(old('sortlr') == 'left') ? 'checked' : ''}} >
        <label for='left'>Left to Right</label>
        <input type='radio' name='sortlr' id='right' value='right' {{(old('sortlr') == 'right') ? 'checked' : ''}} >
        <label for='right'>Right to Left</label>
        <br /><br />
        <div class='details'>*Write back message by sorting top to bottom, or bottom to top?</div>
        <input type='radio' name='sorttb' id='top' value='top' {{(old('sorttb') == 'top') ? 'checked' : ''}} >
        <label for='top'>Top to Bottom</label>
        <input type='radio' name='sorttb' id='bottom' value='bottom' {{(old('sorttb') == 'bottom') ? 'checked' : ''}} >
        <label for='left'>Bottom to Top</label>
        <br /><br />
        <input type='checkbox' value='true' name='display' id='display' {{ old('display') == 'true' ? 'checked' : ''}}>
        <label for='display'>Also display message and encoding as a table?</label>
        <br /><br />

        <input type='submit' class='btn btn-primary' value='Submit'>
    </form>


{{-- simple error checking --}}
@if(count($errors) > 0)
    <div class='alert'>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- show results if keyword exists (required field) --}}
@if(!is_null($keyword))
    <a name="results"></a><div class='results'>
        <h3>Keyword</h3>
        <p class='message'>{{ $keyword }}</p>

        <h3>Original Message</h3>
        <p class='message'>{{ $message }}</p>

        <h3>Encoded Message</h3>
        <p class='message'>{{ $encodedmsg }}</p>
    {{-- show table if display table is true --}}
    @if(!is_null($display))
        <div class='row'>
            <div class='column'>
                <h2>Original Message in table</h2>
                <table class='original'>
                    <tr>
                    @foreach($keywordarray as $key => $value)
                        <th>{{$value}}</th>
                    @endforeach
                    </tr>
                    @foreach($newmsg as $key => $row)
                        <tr>
                        @foreach($row as $k => $value)
                            <td>{{$value}}</td>
                        @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class='column'>
                <h2>Encoded Message in table</h2>
                <table class='encoded'>
                    <tr>
                        @foreach($encodedarray as $key => $row)
                            <tr>
                            <th>{{ substr($key,0,1) }}</th>
                            @foreach($row as $k => $value)
                                <td>{{$value}}</td>
                            @endforeach
                            </tr>
                        @endforeach
                    </tr>

                </table>
            </div>
        </div>
    @endif
@endif
</div>
@endsection
