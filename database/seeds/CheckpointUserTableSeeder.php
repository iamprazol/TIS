<?php

use Illuminate\Database\Seeder;
use App\CheckpointUser;

class CheckpointUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cu1 = [
            'user_id' => 2,
            'checkpoint_id' => 1
        ];

        CheckpointUser::create($cu1);
    }
}
