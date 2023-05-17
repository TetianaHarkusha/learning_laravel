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
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->constrained()->after('text');
        });

        //seed these columns by random values id from users
        $users = DB::table('users')->pluck('id'); //collection user_id
        $postsId = DB::table('posts')->pluck('id'); //collection post_id

        foreach ($postsId as $id) {
            DB::table('posts')->where('id', $id)
            ->update(['user_id' => fake()->randomElement($users),]);
        };

        //add foreign keys
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable($value = false)->change();
            $table->foreign('user_id')->references('id')->on('users')->nullable($value = false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
