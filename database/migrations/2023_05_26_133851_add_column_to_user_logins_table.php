<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //add new columns 'role'
        Schema::table('user_logins', function (Blueprint $table) {
            $table->string('role', 20)->after('login')->default('user');
        });

        //update values in this column 
        foreach(UserRoleEnum::cases() as $role) 
        {
            $roleId = DB::table('roles')->where('name', $role->value)->value('id');
            DB::table('user_logins')->where('role_id', $roleId)->update(['role' => $role->value]);
        }

        //drop "role_id" column
        Schema::table('user_logins', function (Blueprint $table) {
            $table->dropForeign('user_logins_role_id_foreign');
            $table->dropColumn('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //add columns 'role_id'
        Schema::table('user_logins', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable()->constrained()->after('user_id');
        });

        //add values in this column 
        foreach(UserRoleEnum::cases() as $role) 
        {
            $roleId = DB::table('roles')->where('name', $role->value)->value('id');
            DB::table('user_logins')->where('role', $role->value)->update(['role_id' => $roleId]);
        }

        //add foreign keys
        Schema::table('user_logins', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable($value = false)->change();
            $table->foreign('role_id')->references('id')->on('roles');
        });

        //drop column "role"
        Schema::table('user_logins', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
