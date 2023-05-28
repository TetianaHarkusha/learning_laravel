<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateUsersTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users_updated_at:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Updated the users table, field updated_at ";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('users')->update(['updated_at' => now(),]);
        $this->info('The table update was successful');
    }
}
