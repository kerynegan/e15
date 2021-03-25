<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show()
    {
        $decodedarray = session('decodedarray',null);
        $msgarray = session('msgarray',null);
        $alphakeys = session('alphakeys', null);
        $keywordarray = session('keywordarray', null);
        $encodedarray = session('encodedarray', null);
        $keyword = session('keyword', null);
        $message = session('message', null);
        $alphaorder = session('alphaorder', false);
        $specialcharacters = session('specialcharacters', false);
        $sortlr = session('sortlr', 'left');
        $sorttb = session('sorttb', 'top');
        $display = session('display', null);

        
        return view('page/welcome', [
            'decodedarray' => $decodedarray,          
            'msgarray' => $msgarray,
            'alphakeys' => $alphakeys,
            'keywordarray' => $keywordarray,
            'encodedarray' => $encodedarray,
            'keyword' => $keyword,
            'message' =>$message,
            'alphaorder' => $alphaorder,
            'specialcharacters' => $specialcharacters,
            'sortlr' => $sortlr,
            'sorttb' =>$sorttb,
            'display' =>$display        
        ]);
 

    }
    public function contact()
    {
        return view('page/contact');

    }

}
