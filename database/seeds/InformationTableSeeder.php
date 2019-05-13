<?php

use Illuminate\Database\Seeder;
use App\Information;

class InformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i1 = [
            'user_id' => 2,
            'purpose_id' => 1,
            'country_name' => 'Australia',
            'tourist_name' => 'Darwin Patt',
            'age' => 20,
            'visa_period' => "2019-10-11"
        ];

        Information::create($i1);
    }
}
