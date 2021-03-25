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
        $alphaorder = session('alphaorder', null);
        $specialcharacters = session('specialcharacters', null);
        $sortlr = session('sortlr', 'left');
        $sorttb = session('sorttb', 'top');

        
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
            'sorttb' =>$sorttb           
        ]);
 

    }
    public function contact()
    {
        return view('page/contact');

    }

}
