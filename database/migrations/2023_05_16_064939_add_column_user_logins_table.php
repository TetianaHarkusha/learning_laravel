<?php

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
        //add new columns 'role_id'
        $roleUser = DB::table('roles')->where('name', 'user')->value('id');
        
        Schema::table('user_logins', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable()->constrained()->after('user_id');
        });

        //seed this column by id role 'user'
        DB::table('user_logins')->update(['role_id' => $roleUser]);

        //add foreign keys
        Schema::table('user_logins', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable($value = false)->change();
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_logins', function (Blueprint $table) {
            $table->dropForeign('user_logins_role_id_foreign');
            $table->dropColumn('role_id');
        });
    }
};
