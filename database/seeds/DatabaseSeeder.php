<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CheckpointTableSeeder::class);
        $this->call(CheckpointUserTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        factory('App\Purpose', 10)->create();
        factory('App\Information', 335)->create();
        factory('App\UserPurpose', 500)->create();
    }
}
