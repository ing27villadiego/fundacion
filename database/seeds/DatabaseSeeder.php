<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(PaymenttypesTableSeeder::class);
        $this->call(PaymentperiodsTableSeeder::class);
        $this->call(DatafamiliesTableSeeder::class);
        $this->call(GodchildrensTableSeeder::class);

    }
}
