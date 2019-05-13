<?php

use Illuminate\Database\Seeder;
use App\Review;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
            'tourist_name' => 'Darwin Patt',
            'email' => 'patt@gmail.com',
            'description' => 'Bunjee Jump is the best part of the adventure'
        ];

        Review::create($r1);
    }
}
