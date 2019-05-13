<?php

use Illuminate\Database\Seeder;
use App\Purpose;

class PurposeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = [
          'purpose' => 'Paragliding'
        ];

        $p2 = [
          'purpose' => 'Bunjee Jump'
        ];

        Purpose::create($p1);
        Purpose::create($p2);
    }
}
