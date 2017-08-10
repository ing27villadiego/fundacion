<?php

use Illuminate\Database\Seeder;
use App\Funpacol\Entities\Paymenttype;

class PaymenttypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paymenttype::create([
            'id' => 1,
            'name' => 'Efectivo'
        ]);
        Paymenttype::create([
            'id' => 2,
            'name' => 'Cheque'
        ]);
        Paymenttype::create([
            'id' => 3,
            'name' => 'Debito Automatico'
        ]);
        Paymenttype::create([
            'id' => 4,
            'name' => 'Tarjeta de Credito'
        ]);
        Paymenttype::create([
            'id' => 5,
            'name' => 'Libranza'
        ]);
        Paymenttype::create([
            'id' => 6,
            'name' => 'Nomina'
        ]);
        Paymenttype::create([
            'id' => 7,
            'name' => 'Datafono'
        ]);
    }
}
