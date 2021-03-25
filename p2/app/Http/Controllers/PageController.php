<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show()
    {
        $msgarray = session('msgarray', null);
        $encodedarray = session('encodedarray', null);
        $keyword = session('keyword', null);
        $message = session('message', null);
        $alphaorder = session('alphaorder', null);
        $specialcharacters = session('specialcharacters', null);
        $sortlr = session('sortlr', null);
        $sorttb = session('sorttb', null);

        
        return view('page/welcome', [
            'msgarray' => $msgarray,
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
