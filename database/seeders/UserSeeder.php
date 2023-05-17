<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds to update columns 'city_id' and 'position_id' 
     * by random values id from table 'cities' and 'positions'
     * 
     * @return void
     */
    public function run()
    {
        $positions = DB::table('positions')->pluck('id'); //collection position_id
        $cities = DB::table('cities')->pluck('id'); //collection city_id
        $usersId = DB::table('users')->pluck('id'); //collection id

        foreach ($usersId as $id) {
            DB::table('users')->where('id', $id)
            ->update(['city_id' => fake()->randomElement($cities), 'position_id' => fake()->randomElement($positions)]);
        };
    }
}
