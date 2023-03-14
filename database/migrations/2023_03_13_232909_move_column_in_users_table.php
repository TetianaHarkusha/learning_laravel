<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations to move the column in the table 'users'
     *
     * @return void
     */
    public function up()
    {
        //rename the column
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('first_name', 'first_name_old');

            //add a new column in the correct place
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 40)->first();
        });

        //Copy data from old to new column
        //make later

        //delete the old column
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name_old');
        });
    }

    /**
     * Reverse the migrations to move tha column back
     *
     * @return void
     */
    public function down()
    {
        //rename the column
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('first_name', 'first_name_old');

            //add a new column in the correct place
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 40)->after('id');
        });

        //Copy data from old to new column
        //make later

        //delete the old column
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name_old');
        });
    }
};
