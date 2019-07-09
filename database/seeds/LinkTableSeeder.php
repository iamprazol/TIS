<?php

use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $l1 = [
            'link' => 'http://www.moitfe.gandaki.gov.np/en/',
            'display_name' => 'Gandaki Tourism Board'
        ];

        $l2 = [
            'link' => 'https://www.welcomenepal.com/',
            'display_name' => 'Nepal Tourism Board'
        ];

        $l3 = [
            'link' => 'http://www.pokharamun.gov.np/',
            'display_name' => 'Pokhara Metropolitan'
        ];

        $l4 = [
            'link' => 'https://cid.nepalpolice.gov.np/index.php/cid-wings/tourist-police',
            'display_name' => 'Tourist Police Pokhara'
        ];

        \App\UsefulLink::create($l1);
        \App\UsefulLink::create($l2);
        \App\UsefulLink::create($l3);
        \App\UsefulLink::create($l4);
    }
}
