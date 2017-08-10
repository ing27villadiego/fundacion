<?php

use Illuminate\Database\Seeder;
use App\Funpacol\Entities\Postmen;

class PosmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postmen::create([
            'id' => 1,
            'city_id' => 1,
            'employee_id' => 1,
            'position_id' => 1,
            'state' => 1
        ]);
    }
}
