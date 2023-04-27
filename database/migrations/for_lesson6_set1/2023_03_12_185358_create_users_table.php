<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations to create table 'users'
     * for pp.3,5
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->string('surname', 50);
            $table->date('data_birthday');
            $table->date('data_create');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations to delete table 'users'
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
