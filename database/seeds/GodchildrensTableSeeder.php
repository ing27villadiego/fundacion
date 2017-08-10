<?php

use Illuminate\Database\Seeder;
use App\Funpacol\Entities\Godchildren;

class GodchildrensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Godchildren::create([
            'id' => 1,
            'first_name' => 'jeaffer',
            'last_name' => 'villa',
            'document_id' => 2,
            'document' => '92090182023',
            'birth_date' => '2017-09-01',
            'datafamily_id' => 1,
            'city_id' => 1,
            'state' => 1
        ]);
    }
}
