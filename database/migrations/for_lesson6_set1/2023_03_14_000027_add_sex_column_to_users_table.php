<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations to add the column with values from a list
     * for p.14
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('sex', ['M', 'W'])->after('id');
        });
    }

    /**
     * Reverse the migrations to drop the column
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'sex')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('sex');
            });
        };
    }
};
