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

        //if the message array isn't evenly divisible by the keyword
        if( $messagecount % $keywordcount!= 0) {
            $x = $keywordcount - ($messagecount % $keywordcount);
            //add random letters to the end of the message array until it is evenly divisible.
            for($i = 0; $i < $x; $i++ ){
                $rand = random_int(65,90);
                $msgarray[] = chr($rand);
            }
        };
        $messagecount = count($msgarray);

        if(!$sortlr){
            krsort($msgarray);         
        };
        $newMsg =[];

        // $k = $keywordcount;
        for($i = 0; $i < $keywordcount; $i++){
            for($m=(0+$i); $m<$messagecount; $m+=$keywordcount){
                $s = $msgarray[$m];
                $newMsg[] = $s;
            }
        };
        // dd($msgarray);
  
        $newKeys = [];
        $alphakeys = [];
        foreach($keywordarray as $m => $value) {
            $alphakeys[] = $value . sprintf("%02d", $m);  
            for($i = 00; $i < $messagecount/$keywordcount; $i++){           
                $newKeys[] = $value . sprintf("%02d", $m) . sprintf("%02d", $i);
            }
        }
        // dd($msgarray);
        $decodedarray = array_combine ($newKeys, $msgarray);
        $encodedarray = array_combine ( $newKeys, $newMsg );
        ksort($encodedarray);
        ksort($alphakeys);
        // dd($encodedarray);
        // dd($alphakeys);
        // ksort($encodedarray);
        // dd($encodedarray);

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
            'sorttb' => $sorttb
            ])->withInput();

    }  
}

