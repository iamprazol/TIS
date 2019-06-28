<?php

use Illuminate\Database\Seeder;
use App\Districts;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d1 = [
            'district_name' => 'Manang',
            'picture' => '123.jpeg' ,
            'description' => 'Natural heritages are Tilicho Lake, Annapurna and Gangapurna while Cultural/Religious heritages are Gompa at Manang and Braga.'
        ];

        Districts::create($d1);
    }
}
