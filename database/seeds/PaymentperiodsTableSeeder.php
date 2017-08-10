<?php

use Illuminate\Database\Seeder;
use App\Funpacol\Entities\Paymentperiod;

class PaymentperiodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paymentperiod::create([
            'id' => 1,
            'name' => 'Mensual'
        ]);
        Paymentperiod::create([
            'id' => 2,
            'name' => 'Bimensual'
        ]);
        Paymentperiod::create([
            'id' => 3,
            'name' => 'Trimestral'
        ]);
        Paymentperiod::create([
            'id' => 4,
            'name' => 'Semestral'
        ]);
        Paymentperiod::create([
            'id' => 5,
            'name' => 'Anual'
        ]);
    }
}
