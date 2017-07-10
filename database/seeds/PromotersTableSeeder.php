<?php

use Illuminate\Database\Seeder;
use App\Funpacol\Entities\Promoter;

class PromotersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promoter::create([
            'id' => 1,
            'first_name' => 'Jeaffer',
            'last_name' => 'Villadiego Turizo',
            'document_id' => 1,
            'document' => '1066739863',
            'address' => 'cll 41 # 6B - 14',
            'cell_phone' => '3006627582',
            'date_birthday' => '2017-09-01',
            'email' => 'jeyferv@gmail.com',
            'city_id' => 2,
            'state' => 1
        ]);
    }
}
