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
            'purpose' => 'Paraglyding'
        ];

        $p2 = [
            'purpose' => 'Trekking'
        ];

        $p3 = [
            'purpose' => 'Rafting'
        ];

        $p4 = [
            'purpose' => 'Boating'
        ];

        $p5 = [
            'purpose' => 'Canyoing'
        ];

        Purpose::create($p1);
        Purpose::create($p2);
        Purpose::create($p3);
        Purpose::create($p4);
        Purpose::create($p5);
    }
}
