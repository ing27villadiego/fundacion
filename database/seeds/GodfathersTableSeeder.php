<?php

use Illuminate\Database\Seeder;
use App\Funpacol\Entities\Godfather;

class GodfathersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Godfather::create([
            'id' => 1,
            'date_membership' => '2017-07-18',
            'code_godfather' => 'B2323',
            'promoter_id' => 1,
            'adviser_id' => 1,
            'first_name' => 'jeaffer',
            'last_name' => 'villadiego',
            'document_id' => 1,
            'document' => '1066739863',
            'date_birthday' => '2017-07-18',
            'email' => 'jeyferv@gmail.com',
            'address_office' => 'cll 32 # 43 - 23',
            'district_office' => 'magdalena',
            'phone_office' => '3006627582',
            'cell_phone_office' => '3006627582',
            'whatsapp' => '3006627582',
            'profesion' => 'ing sistemas',
            'charge' => 'co cofunder',
            'business' => 'sistes',
            'address_house' => 'cll 32 # 43 - 23',
            'district_house' => 'magdalena',
            'district_house' => 'magdalena',
            'phone_house' => '3006627582',
            'city_id' => 1,
            'godchildren_id' => 1,
            'community' => 'wayyu',
            'paymenttype_id' => 1,
            'paymentperiod_id' => 1,
            'type_godfather' => 1,
            'value_donation' => '100000',
            'day_colletion' => '12',
            'state' => 1,

        ]);
    }
}
