<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Show the specified city.
     *
     * @param  string $name
     */
    public function show(string $name = 'Kyiv')
    {
        return 'Місто ' . $name .'.';
    }
}
