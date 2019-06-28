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
        $this->call(AboutUsSeeder::class);
        $this->call(PurposeTableSeeder::class);
        $this->call(ContactUsTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        factory('App\Purpose', 10)->create();
        factory('App\Countries', 30)->create();
        factory('App\Information', 320)->create();
        factory('App\UserPurpose', 500)->create();
        factory('App\ExitInfo', 500)->create();
    }
}
