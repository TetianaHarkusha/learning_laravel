<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $positions = DB::table('positions')->pluck('id');
        $cities = DB::table('cities')->pluck('id');
        
        //validator function
        $populationValidator = function ($digit) {
            return $digit % 1000 === 0;
        };
        return [
            'name' => fake()->city(),
            'population' => fake()->valid($populationValidator)->numberBetween(1000,500000),
            'city_id' => fake()->randomElement($cities),
            'position_id' => fake()->randomElement($positions),
        ];
    }
}
