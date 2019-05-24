<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
            'role_name' => 'Super Admin',
        ];

        $r2 = [
            'role_name' => 'Admin',
        ];

        $r3 = [
            'role_name' => 'User',
        ];

        Role::create($r1);
        Role::create($r2);
        Role::create($r3);
    }
}
