<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations to drop columns from the table 'users'
     * for p.7
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name', 'surname']);
        });
    }

    /**
     * Reverse the migrations to add columns to the table 'users'
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasColumn('users', 'name')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('name', 40)->after('id');
            });
        };
        if (!Schema::hasColumn('users', 'surname')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('surname', 50)->after('name');
            });
        };
    }
};
