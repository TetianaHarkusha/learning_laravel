<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;

class CountryController extends Controller
{
    /**
     * Show all countries with cities by queries for lesson10
     */
    public function showAllWithCities($id)
    {
        //the names of the required columns of the tables
        $columnNames[0] = array_keys(Country::firstOrFail()->getAttributes());
        $columnNames['cities'] = ['id', 'name', 'population' , 'country_id'];

        switch ($id) {
            case 1://p.9 the cities population > 100 000
                $countries = Country::with(['cities' => function ($query) {
                    $query->select('id', 'name', 'population', 'country_id')->where('population', '>', 100000);
                }])->paginate(5);
                $topic = 'Інформація про країни з містами понад 100 тис.населення:';
                break;
            case 2://p.10 the countries with cities order by population
                $countries = Country::with(['cities' => function ($query) {
                    $query->select('id', 'name', 'population', 'country_id')->orderBy('population');
                }])->paginate(5);
                $topic = 'Інформація про країни з містами, відсортованими за зростаннем населення:';
                break;
            default: return redirect()->route('homework.list');
        }
        return view('Pages.city', [
            'title' => 'countries-with-cities',
            'topic' => $topic,
            'columnNames' => $columnNames,
            'countries' => $countries,
        ]);
    }

    /**
     * Show all countries with cities without users lesson10 p.15
     */
    public function showWithUsers()
    {
        //the names of the required columns of the tables
        $columnNames[0] = array_keys(Country::firstOrFail()->getAttributes());
        $columnNames['cities'] = ['id', 'name', 'population', 'country_id'];
        $countries = Country::with(['cities' => function ($query) {
            $query->select('id', 'name', 'population', 'country_id')->has('users')->orderBy('population');
        }])->paginate(5);

        return view('Pages.city', [
            'title' => 'city-without-user',
            'topic' => 'Інформація про країни з містами, відсортованими за зростаннем населення з зареєстрованми користувачами:',
            'columnNames' => $columnNames,
            'countries' => $countries,
        ]);
    }
}
