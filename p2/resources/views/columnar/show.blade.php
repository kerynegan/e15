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
        <p>A typical columnar cipher lays out a keyword as the heading row of a table, one letter to one column.</p>
        <p>The message to be encoded is written horizontally letter-by-letter into the table cells, with any remaining columns filled in with random letters.</p>
        <img src="/images/codebreaker_03.png" width="75%">
        <p>The columns are then rearranged so as to place the keyword in alphabetical order</p>
        <p>and then the message is written back by reading the columns top to bottom.</p>
        <img src="/images/codebreaker_04.png" width="75%">
        <h2>Variations</h2>
        <p>Ciphers like this can be altered in any number of ways, so long as the Messenger and the Recipient both know how to encode/decode the message. Examples of variations can include:</p>
        <ul>
            <li>reversing the alpha order in which the columns are rearranged (A->26, Z->1),</li>
            <li>keeping special characters such as spaces and apostrophes intact,</li>
            <li>encoding the message by writing the letters to the table from right to left, or</li>
            <li>writing back the encoded message by reading the columns bottom to top.</li>
        </ul>
    </div>
    <h2>Ready to encode your message?</h2>

    <form method='GET' action='/columnar/create' id='columnarform'>
        <div class='details'>* Required fields</div><br />

        <label for='keyword'>* Keyword (max 15 characters)</label>
        <input type='text' name='keyword' id='keyword' value='{{ old('keyword') }}'><br /><br />

        <label for='message'>* Message (minimum 20 characters)</label>
        <textarea name='message' id='message' rows="4" cols="50" value='{{ old('message') }}'></textarea><br /><br />

        <label for='alphaorder'>Reverse the alpha order for the columns so that Z is first and A is last?</label>
        <input type='checkbox' value='true' name='alphaorder' id='alphaorder'><br /><br />

        <label for='specialcharacters'>Keep special characters such as spaces and apostrophes intact?</label>
        <input type='checkbox' value='true' name='specialcharacters' id='specialcharacters'><br /><br />

        <div class='details'>Encode by sorting left to right, or right to left?</div>
        <label for='left'>Left to Right</label>
        <input type='radio' name='sortlr' id='left' value='left' {{(old('sortlr') == 'left') ? 'checked' : ''}} >
        <label for='left'>Right to Left</label>
        <input type='radio' name='sortlr' id='right' value='right' {{(old('sortlr') == 'right') ? 'checked' : ''}} ><br /><br />

        <div class='details'>Write back message by sorting top to bottom, or bottom to top?</div>
        <label for='top'>Top to Bottom</label>
        <input type='radio' name='sorttb' id='top' value='top' {{(old('sorttb') == 'top') ? 'checked' : ''}} >
        <label for='left'>Bottom to Top</label>
        <input type='radio' name='sorttb' id='bottom' value='bottom' {{(old('sorttb') == 'bottom') ? 'checked' : ''}} ><br /><br />

        <label for='display'>Display message and encoding in table form? (Default is yes)</label>
        <input type='checkbox' value='true' name='display' id='display' checked><br />

        <input type='submit' class='btn btn-primary' value='Submit'>
    </form>


@if(count($errors) > 0)
    <ul class='alert'>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if(!is_null($keyword))
    <div class='results'>

        <h3>Original Message</h3>
        <p class='message'>{{ $message }}</p>

        <h3>Encoded Message</h3>
        <p class='message'>@foreach($encodedarray as $key => $value){{$value}}@endforeach</p>

    @if($display == true)
        <div class='row'>
            <div class='column'>
                <h2>Original Message in table</h2>
                <table>
                    <tr>
                    @foreach($keywordarray as $key => $value)
                        <th>{{$value}}</th>
                    @endforeach
                    </tr>
                    @foreach($keywordarray as $key => $value)
                        <tr>
                            @foreach($decodedarray as $m => $msg)
                                @if(($value . sprintf("%02d", $key))==substr($m,0,3))
                                    <td>{{$msg}}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class='column'>
                <h2>Encoded Message in table</h2>
                <table>
                    <tr>
                    <?php asort($alphakeys);?>
                    @foreach($alphakeys as $key => $value)
                        <th>{{substr($alphakeys[$key],0,1)}}</th>
                    @endforeach
                    </tr>

                    @foreach($alphakeys as $key => $value)
                        <tr>
                            @foreach($encodedarray as $m => $msg)
                                @if($value == substr($m,0,3))
                                    <td>{{$msg}}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endif
@endif
</div>
@endsection
