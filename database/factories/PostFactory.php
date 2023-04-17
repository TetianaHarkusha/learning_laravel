<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state
     * with the probability to get the default value for likes
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence();
        $slug = Str::of($title)->slug('-');
        return [
            'title' => $title,
            'slug' => $slug,
            //the probability of receiving the default value likes
            'likes' => $this->faker->optional(0.5, 0)->numberBetween(1, 100),
        ];
    }
}
