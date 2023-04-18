<?php

use Database\Seeders\UserSeeder as SeedersUserSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Add foreign keys for table with values
     *
     * @return void
     */
    public function up()
    {
        //add new columns 'city_id' and 'position_id'
        Schema::table('users', function (Blueprint $table) {
            $table->after('email', function ($table) {
                $table->unsignedBigInteger('city_id')->nullable()->constrained();
                $table->unsignedBigInteger('position_id')->nullable()->constrained();
            });
        });

        //seed these columns by random values id from cities and positions
        $seeder = new \Database\Seeders\UserSeeder();
        $seeder->run();

        //add foreign keys
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_city_id_foreign');
            $table->dropForeign('users_position_id_foreign');
            $table->dropColumn(['city_id', 'position_id']);
        });
    }
};
