<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     *  Run the database seeds to create 10 records using factory
     *
     * @return void
     */
    public function run()
    {
        Post::factory(10)->create();
    }
}
