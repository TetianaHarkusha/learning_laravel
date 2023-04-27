<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds to create 20 records.
     *
     * @return void
     */
    public function run()
    {
        Position::factory(20)->create();
    }
}
