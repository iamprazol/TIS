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
        $this->call(UserTableSeeder::class);
        $this->call(CheckpointTableSeeder::class);
        $this->call(CheckpointUserTableSeeder::class);
        $this->call(InformationTableSeeder::class);
        $this->call(PurposeTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
    }
}
