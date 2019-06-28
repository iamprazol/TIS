<?php

use Illuminate\Database\Seeder;
use App\Places;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = [
            'districts_id' => 1,
            'place_name' => 'GangaPurna Lake',
            'description' => 'This is a photo of a natural site in Nepal identified by the ID',
            'picture' => '123.jpg'
        ];

        Places::create($p1);
    }
}
