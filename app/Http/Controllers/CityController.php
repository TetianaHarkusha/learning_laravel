<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

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

    /**
     * Show all countries with cities by queries for lesson10 p.12
     */
    public function showAllWithCountry()
    {
        //the names of the required columns of the tables
        $columnNames[0] = array_keys(City::firstOrFail()->getAttributes());
        $columnNames['country'] = ['id', 'name'];
        return view('Pages.city', [
            'title' => 'city-with-country',
            'topic' => 'Інформація про міста понад 100 тис.населення (з країнами):',
            'columnNames' => $columnNames,
            'cities' => City::where('population', '>', 100000)->with('country:id,name')->paginate(10),
        ]);
    }
}
