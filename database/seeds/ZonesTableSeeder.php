<?php

use Illuminate\Database\Seeder;
use App\Funpacol\Entities\Zone;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zone::create([
            'id' => 1,
            'city_id' => 2,
            'name' => 'Soledad',
            'slug'  => 'soledad',
            'state' => 1,
        ]);
    }
}
