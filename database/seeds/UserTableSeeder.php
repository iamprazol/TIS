<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u1 = [
            'full_name' => 'Prajjwal Poudel',
            'is_admin' => 1,
            'email' => 'iamprazol@gmail.com',
            'password' => bcrypt('prajjwal123'),
            'phone' => 9845690436
        ];

        $u2 = [
            'full_name' => 'Kushal Poudel',
            'is_admin' => 0,
            'email' => 'ku@gmail.com',
            'password' => bcrypt('prajjwal123'),
            'phone' => 9855690436
        ];

        User::create($u1);
        User::create($u2);
    }
}
