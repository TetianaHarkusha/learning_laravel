<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        //validator function
        $populationValidator = function ($digit) {
            return $digit % 1000 === 0;
        };
        return [
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'population' => $this->faker->valid($populationValidator)->numberBetween(1000,1000000),
        ];
    }
}
