<?php

use Illuminate\Database\Seeder;
use App\ContactUs;

class ContactUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = [
            'address' => 'Pokhara 7, Gandaki Pradesh',
            'email' => 'moitfe4@gmail.com',
            'phone' => '061-467654',
            'fax' => '061-467670'
        ];

        ContactUs::create($c1);
    }
}
