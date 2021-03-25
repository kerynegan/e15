<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CipherController extends Controller
{
    public function show(Request $request)
    {
        return view('columnar/show')->with([
            'decodedarray' => session('decodedarray', null),
            'msgarray' => session('msgarray', null),
            'alphakeys' => session('alphakeys',null),
            'keywordarray' => session('keywordarray', null),
            'encodedarray' => session('encodedarray', null),
            'keyword' => session('keyword', null),
            'message' => session('message', null),
            'alphaorder' => session('alphaorder', null),
            'specialcharacters' => session('specialcharacters', null),
            'sortlr' => session('sortlr', 'left'),
            'sorttb' => session('sorttb', 'top'),
            'display' => session('display', false),
        ]);


    }
    public function create(Request $request) 
    {
        $request->validate([
            'keyword' =>'required',
            'message' => 'required',
            'sortlr' =>'required',
            'sorttb' => 'required',
        ]);
        //variables for inputs
        $keyword = $request->input('keyword', '');
        $message = $request->input('message', '');
        $alphaorder = $request->input('alphaorder', false);
        $specialcharacters = $request->input('specialcharacters', false);
        $sortlr = $request->input('sortlr', 'left');
        $sorttb = $request->input('sorttb', 'top');
        $display = $request->input('display', null);

        //turn keywords and messages to uppercase.
        $keyword = strtoupper(preg_replace('%\W%',"", $keyword));
        $message = strtoupper($message);

        //create the initial message array, with or without special characters
        if (!$specialcharacters) {
            $msgarray = str_split(preg_replace('%\W%',"", $message));
        } else {
            $msgarray = str_split($message);
        }
        //create an array from the keyword
        $keywordarray = str_split($keyword);
        //get the length of both arrays.
        $keywordcount = count($keywordarray);
        $messagecount = count($msgarray);
        // if($sortlr == 'right'){
        //     krsort($msgarray);         
        // };

        /*
        if the message array isn't evenly divisible by the keyword
        add random letters to the end of the message array until it is evenly divisible.
        */
        if( $messagecount % $keywordcount!= 0) {
            $x = $keywordcount - ($messagecount % $keywordcount);
            for($i = 0; $i < $x; $i++ ){
                $rand = random_int(65,90);
                $msgarray[] = chr($rand);
            }
        };

        //get the new length of the message array
        $messagecount = count($msgarray);

        //push a resorted message array (sorted based on the keyword length)
        $newmsg =[];
        for($i = 0; $i < $keywordcount; $i++){
            for($m=(0+$i); $m<$messagecount; $m+=$keywordcount){
                $s = $msgarray[$m];
                $newmsg[] = $s;
            }
        };

        /*
        To sort the message by the keyword in the table, we need to know  
        a)how many times letters in the keyword are repeated and what order 
        all duplicates were originally in, and b) based on the length of the message, 
        how many rows we'll need of each letter in the keyword. 
        To get there, we'll create two arrays. 
        The first is equal to the length of the keyword, and combines the key value + the key number,
        (with a leading zero) to sort correctly.
        The second array is the same concept, but combined with the length of the message
        in order to get us a sortable key for the associative arrays.
        */
        $newKeys = [];
        $alphakeys = [];
        foreach($keywordarray as $m => $value) {
            $alphakeys[] = $value . sprintf("%02d", $m);  
            for($i = 00; $i < $messagecount/$keywordcount; $i++){           
                $newKeys[] = $value . sprintf("%02d", $m) . sprintf("%02d", $i);
            }
        }
        /*create the associative arrays, one each for the original message (+ extra letters)
        and the other for the encoded array (still +extra letters!) */
        $decodedarray = array_combine ($newKeys, $msgarray);
        $encodedarray = array_combine ($newKeys, $newmsg );

        //then we can sort the encoded message array by key to get the right order.
        ksort($encodedarray);

        return redirect('/columnar')->with([
            'decodedarray' => $decodedarray,
            'alphakeys' => $alphakeys,
            'msgarray' => $msgarray,
            'keywordarray' => $keywordarray,
            'encodedarray' => $encodedarray,
            'keyword' => $keyword,
            'message' => $message,
            'alphaorder' => $alphaorder,
            'specialcharacters' => $specialcharacters,
            'sortlr' => $sortlr,
            'sorttb' => $sorttb,
            'display' => $display,
            ])->withInput();

    }  
}

