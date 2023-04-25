<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTestRequest;

class TestController extends Controller
{
    /**
     * Test function with form for POST or GET request 
     * 
     * @param App\Http\Requests\StoreTestRequest $request
     * @return Illuminate\Http\Response;
     */
    public function testForm(StoreTestRequest $request) 
    {
        if(is_null($request->input('num1')) && is_null($request->input('num2')) && is_null($request->input('num3'))) {
            $result = NULL; 
        } else {
            $result = $request->input('num1') + $request->input('num2') + $request->input('num3');
        }
        return view('Pages.test', [
            'num1' => $request->input('num1'),
            'num2' => $request->input('num2'),
            'num3' => $request->input('num3'),
            'result' => $result,
            'title' => 'test', 
        ]);
    }

    /**
     * Test function to get response
     * 
     * @return Illuminate\Http\Response;
     * @return integer $id
     */
    public function myResponse (StoreTestRequest $request, $id) {
        switch ($id) {
            case 1: //first response
                return response ('Привіт, гість! Давай знайомитися.', 201);
            case 2: //second response
                return response ('Вибачте, Ви здається заблукали', 404);
            default: return redirect()->route('homework.list');
        };
    }
}
