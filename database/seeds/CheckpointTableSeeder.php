<?php

use Illuminate\Database\Seeder;
use App\Checkpoint;

class CheckpointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = [
            'checkpoint_name' => 'Aabu Khareni'
        ];

        $c2 = [
            'checkpoint_name' => 'Ramdi Bridge'
        ];

        Checkpoint::create($c1);
        Checkpoint::create($c2);
    }
}
