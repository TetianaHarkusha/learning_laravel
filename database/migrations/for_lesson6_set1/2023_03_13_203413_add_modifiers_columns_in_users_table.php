<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations to add modifiers columns in the table 'user'.
     * for pp.9-12
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email', 50)->comment('Електронна адреса користувача')->change();
            $table->float('salary', 10, 2)->default(0)->change();
            $table->unsignedInteger('age')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations to cancel columns modifiers
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email', 50)->comment(null)->change();
            $table->float('salary', 10, 2)->default(null)->change();
            $table->integer('age')->nullable($value = false)->change();
        });
    }
};
