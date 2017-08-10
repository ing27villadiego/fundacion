<?php

use Illuminate\Database\Seeder;
use App\Funpacol\Entities\Datafamily;

class DatafamiliesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Datafamily::create([
            'id' => 1,
            'first_name' => 'mama uno',
            'last_name' => 'mama uno',
            'document_id' => 1,
            'document' => '509876754',
            'city_id' => 1,
            'address' => 'cll wayyu',
            'cell_phone' => '3008900908',
            'date_birthday' => '2017-09-08',
            'number_brothers' => '2',
            'name_brothers' => 'hijo uno, hijo dos',
            'state' => 1
        ]);
    }
}
