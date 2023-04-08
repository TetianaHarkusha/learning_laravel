<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations to rename columns in the table 'user'
     * for p.8.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'first_name');
            $table->renameColumn('surname', 'second_name');
        });
    }

    /**
     * Reverse the migrations to rename columns in the table 'user' back
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'first_name')) {
            Schema::table('users', function (Blueprint $table) {
                $table->renameColumn('first_name', 'name');
            });
        };
        if (Schema::hasColumn('users', 'second_name')) {
            Schema::table('users', function (Blueprint $table) {
                $table->renameColumn('second_name', 'surname');
            });
        };
    }
};
