<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    /**
     * Show the specified homework.
     *
     * @param Illuminate\Http\Request $request
     * @param  int $id
     */
    public function showOne(Request $request, $id)
    {
        $name = $request->session()->get('user', 'guest'); //using a request instance
        $lastWork = session('lastWork', 'Lesson14'); //using the global session helper    
        
        return view('Pages.homework.lesson'. $id, [
            'title' => 'Homework',
            'name' => $name,
            'lastWork' => $lastWork,
        ]);
    }

    /**
     * Show all homeworks
     * 
     * @param Illuminate\Http\Request $request
     */
    public function showAll(Request $request)
    {
        $request->session()->put('user', 'Tetiana'); //using a request instance
        session(['lastWork' => 'Lesson14']); //using the global session helper
        return view('Pages.homework.list', ['title' => 'Homework']);
    }
}
