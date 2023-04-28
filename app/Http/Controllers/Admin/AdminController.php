<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
     /**
     * Show the admin panel
     * 
     * @param Illuminate\Http\Request $request
     */
    public function main(Request $request)  
    {
        //added counter and time in the session
        date_default_timezone_set('Europe/Kiev');
        if ($request->session()->has('count')) {
            $request->session()->put('count', $request->session()->increment('count'));
        } else {
            session(['count' => 1, 'time' => date('H:i')]);
        };
        if ($request->session()->missing('time')) {
            $request->session()->put('count',date('H:i'));
        }
        
        return view('Admin.Pages.main', [
            'title' => 'головна',
            'pageName' => 'Головна сторінка',
            'postCount' => DB::table('posts')->count(),
            'userCount' => DB::table('users')->count(),
        ]);
    }
}
