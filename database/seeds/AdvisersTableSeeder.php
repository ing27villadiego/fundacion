<?php

use Illuminate\Database\Seeder;
use App\Funpacol\Entities\Adviser;

class AdvisersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adviser::create([
            'id' => 1,
            'city_id' => 1,
            'employee_id' => 1,
            'position_id' => 1,
            'promoter_id' => 1,
            'state' => 1
        ]);

    }
}
