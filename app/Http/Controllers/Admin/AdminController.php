<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
     /**
     * Show the admin panel
     *
     */
    public function main()  
    {
        return view('Admin.Pages.main', [
            'pageName' => 'Головна сторінка',
            'postCount' => Post::all()->count(),
            'userCount' => User::all()->count(),
        ]);
    }
}
