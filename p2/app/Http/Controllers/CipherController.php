<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CipherController extends Controller
{
    public function show(Request $request)
    {
        return view('columnar/show')->with([
            'msgarray' => session('msgarray', null),
            'encodedarray' => session('encodedarray', null),
            'keyword' => session('keyword', null),
            'message' => session('message', null),
            'alphaorder' => session('alphaorder', null),
            'specialcharacters' => session('specialcharacters', null),
            'sortlr' => session('sortlr', null),
            'sorttb' => session('sorttb', null),
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
        $keywordArray = str_split($keyword);
        //get the length of both arrays.
        $keywordcount = count($keywordArray);
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

        // for($i=($keywordcount+1); $i>0; $i--){
        //     for ($x=$messagecount; $x>=0; $x=-$i){
        //         $s = $msgarray[$x];
        //         $newMsg[] = $s;
        //     }
        // }
        // $i = $messagecount;
        // for($a = ($keywordcount + 1); $a>0; $a--){
        //     foreach($msgarray as $i => $value) {
        //         if ($i-- % $a == 0) {
        //             if(isset($msgarray[$i])){
        //                 $newMsg[] = $value;
        //                 unset($msgarray[$i]);
        //             }
        //             continue;
        //         }
        //         else{
        //             continue;
        //         }
        //     }
        // }

        $k = $keywordcount+1;
        while($k>0){
            for($x = 1; $x<=($messagecount+2); $x++){
                if($x%$k==0){
                    if(isset($msgarray[($x-1)])){
                        $newMsg[] = $msgarray[($x-1)];
                        unset($msgarray[($x-1)]);
                    }
                }
            }
            $k--;
        }
        // krsort($newMsg);  

        // dd($messagecount);
        // dd($msgarray);
        // dd($newMsg);

        $newKeys = [];

        foreach($keywordArray as $value) {
            for($i = 00; $i < $messagecount/$keywordcount; $i++){
                $newKeys[] = $value . sprintf("%02d", $i);
            }
        }
        dump($newKeys);
        $encodedarray = array_combine ( $newKeys, $newMsg );
        ksort($encodedarray);
        dump($encodedarray);

        return redirect('/columnar')->with([
            'msgarray' => $msgarray,
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
