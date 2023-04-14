<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\UserDouble;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(UserDouble::inRandomOrder()->get() as $user) {
            Profile::factory()->count(1)->for($user, 'user')->create();
        };
    }
}