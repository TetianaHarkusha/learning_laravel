<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Remove the session parameter.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function destroy(Request $request)
    {
        if ($request->session()->exists('user')) {
            $request->session()->forget('user');
        };
        
        return back()->withSuccess("Змінна сесії 'user' була успішно видалена.");
    }

    /**
     * Remove all session parameters.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function destroyAll(Request $request)
    {
        $request->session()->flush();
        
        return back()->withSuccess("Змінні сесії були успішно видалені.");
    }

    /**
     * Show all session parameters in array.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function setGetArray(Request $request)
    {
        $request->session()->push('test', 'PHP');
        $request->session()->push('test', 'OOP PHP');
        $request->session()->push('test', 'Laravel');
        //dd($request->session()->all());
        
        return dd($request->session()->get('test'));
    }
}
