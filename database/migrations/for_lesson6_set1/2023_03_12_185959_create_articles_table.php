<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations to create table 'articles'
     * for p.4
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('text');
            $table->date('date_create');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations to delete table 'articles'
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
