<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CipherController extends Controller
{
    public function show(Request $request)
    {
        return view('columnar/show')->with([
            'keywordarray' => session('keywordarray', null),
            'newmsg' => session('newmsg', null),
            'encodedarray' => session('encodedarray', null),
            'encodedmsg' => session('encodedmsg', null),
            'keyword' => session('keyword', null),
            'message' => session('message', null),
            'alphaorder' => session('alphaorder', null),
            'sortlr' => session('sortlr', 'left'),
            'sorttb' => session('sorttb', 'top'),
            'display' => session('display', null),
        ]);


    }
    public function create(Request $request) 
    {
        $request->validate([
            'keyword' =>'required|alpha|min:4|max:15',
            'message' => 'required|min:20',
            'sortlr' =>'required',
            'sorttb' => 'required',
        ]);
        //variables for inputs
        $keyword = $request->input('keyword', '');
        $message = $request->input('message', '');
        $alphaorder = $request->input('alphaorder', false);
        $sortlr = $request->input('sortlr', 'left');
        $sorttb = $request->input('sorttb', 'top');
        $display = $request->input('display', null);

        //turn keywords and messages to uppercase.
        $keyword = strtoupper(preg_replace('%\W%',"", $keyword));
        $message = strtoupper($message);

        //create the initial message array, with or without special characters
        
        $msgarray = str_split(preg_replace("/[^A-Za-z]/","", $message));

        //create an array from the keyword
        $keywordarray = str_split($keyword);
        //get the length of both arrays.
        $keywordcount = count($keywordarray);
        $messagecount = count($msgarray);


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

        //Create an array of rows from the original message
        $newmsg =[];
        $x = 1;
        $temparray = [];
        for($m=0; $m<$messagecount; $m++){
            $s = $msgarray[$m];
            $temparray[] = $s;           
            if($x % $keywordcount == 0){
                //if user chooses to sort left to right, reverse the row array
                if($sortlr == 'right'){
                    $temparray = array_reverse($temparray);
                }
                $newmsg[] = $temparray;
                unset($temparray);
                $temparray = [];
            }   
            $x++;
        };     
        // dd($newmsg);
        $rightmsg = [];
        if($sortlr == 'right'){
            foreach($newmsg as $key=>$row){
                foreach($row as $k=>$value){
                    $rightmsg[] = $value;
                };
            };
        };

        /*
        Create an array of rows for the encoded message with each row 
        assigned a key that relates to the original letter from the keyword. 
        Because keywords could have duplicate letters, to ensure they sort correctly,
        the key combines the original letter and that letter's original key location.
        */
        $encodedarray =[];
        foreach($keywordarray as $key=>$value){
            $temparray = [];
            $r = $value . $key;
            for($m=$key; $m<$messagecount; $m+=$keywordcount){
                if($sortlr == 'right'){
                    $s = $rightmsg[$m];
                } else{
                    $s = $msgarray[$m];
                }
                $temparray[] = $s;
            }
            //if user chooses to sort bottom to top, reverse the row array
            if($sorttb == 'bottom'){
                $temparray = array_reverse($temparray);
            }
            $encodedarray[$r] = $temparray;
            unset($temparray);
        };

        /*sort by key so that the rows are in alpha order. 
        or, if user chose to reverse that order, sort keys Z-A
        */
        if(!$alphaorder){
            ksort($encodedarray);
        } else {
            krsort($encodedarray);
        }

        //Blade adds extra whitespace to nested @foreach loops, so let's export as string.
        $encodedmsg = '';
        foreach($encodedarray as $key => $row){
            foreach($row as $k => $value){
                $encodedmsg = $encodedmsg . $value;
            };
        };


        return redirect('/columnar' . '#results')->with([
            'keywordarray' => $keywordarray,
            'newmsg' => $newmsg,
            'encodedarray' => $encodedarray,
            'encodedmsg' => $encodedmsg,
            'keyword' => $keyword,
            'message' => $message,
            'alphaorder' => $alphaorder,
            'sortlr' => $sortlr,
            'sorttb' => $sorttb,
            'display' => $display,
            ])->withInput();

    }  
}