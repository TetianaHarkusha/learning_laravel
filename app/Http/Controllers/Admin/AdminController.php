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
     */
    public function main()  
    {
        return view('Admin.Pages.main', [
            'title' => 'головна',
            'pageName' => 'Головна сторінка',
            'postCount' => DB::table('posts')->count(),
            'userCount' => DB::table('users')->count(),
        ]);
    }
}
