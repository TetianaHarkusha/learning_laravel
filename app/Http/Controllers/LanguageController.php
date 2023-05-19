<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * The service route puts locale variable in a session
     *
     * @param Illuminate\Http\Request $request
     */
    public function switchLang(Request $request) 
    {
        $request->session()->put('locale', $request->input('lang'));
        return back();
    }
}
