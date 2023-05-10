<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function switchLanguages(Request $request,$l){
        if (array_key_exists($l,config('app.languages'))){
            $request->session()->put('mylocale',$l);
        }
        return back();
    }
}
