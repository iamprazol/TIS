<?php

use Illuminate\Database\Seeder;
use App\AboutUs;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = [
            'description' => 'Nepal Tourism Board is a national tourism organization of Nepal established in 1998 by an Act of Parliament in the form of partnership between the Government of Nepal and private sector tourism industry  to develop and market Nepal as an attractive tourist destination. The Board provides platform for vision-drawn leadership for Nepal’s tourism sector by integrating Government commitment with the dynamism of private sector.

NTB is promoting Nepal in the domestic and international market and is working toward positioning the image of the country. It also aims to regulate product development activities. Fund for NTB is collected in the form of Tourist Service Fee from departing foreign passengers at the Tribhuvan International Airport, Kathmandu, thus keeping it financially independent. The Board chaired by the Secretary at the Ministry of Tourism and Civil Aviation consists of 11 Board Members with five Government representatives, five private sector representatives and the Chief Executive Officer.

“Naturally Nepal, Once is not Enough” is the tourism brand of Nepal.”Naturally Nepal” is a simple expression that repackages the Nepal brand in a positive light. “Once is not Enough” not only accurately captures the tourists\' emotions at the airport’s departure gate but also serves as a decision tool that enables the Nepali tourism industry individually and collectively to focus both on consumer retention and acquisition.

To learn more about NTB and its executive committee board members, please'
        ];

        AboutUs::create($about);

    }
}
