<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations to add columns to table 'users'
     * for p.6
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->string('name', 40);
                $table->string('surname', 50);
                $table->string('email', 50);
                $table->float('salary', 10, 2);
                $table->integer('age');
            });
        });
    }

    /**
     * Reverse the migrations to drop columns from the table 'users'
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'name')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('name');
            });
        };
        if (Schema::hasColumn('users', 'surname')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('surname');
            });
        };
        if (Schema::hasColumn('users', 'email')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('email');
            });
        };
        if (Schema::hasColumn('users', 'salary')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('salary');
            });
        };
        if (Schema::hasColumn('users', 'age')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('age');
            });
        };
    }
};
