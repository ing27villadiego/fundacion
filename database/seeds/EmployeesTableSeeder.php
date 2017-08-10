<?php

use Illuminate\Database\Seeder;
use App\Funpacol\Entities\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'id' => 1,
            'first_name' => 'Jeaffer',
            'last_name' => 'Villadiego Turizo',
            'document_id' => 1,
            'document' => '1066739863',
            'address' => 'cll 41 # 6B - 14',
            'cell_phone' => '3006627582',
            'date_birthday' => '2017-09-01',
            'email' => 'jeyferv@gmail.com',
            'city_id' => 1,
            'position_id' => 1,
            'state' => 1
        ]);

        Employee::create([
            'id' => 2,
            'first_name' => 'juan',
            'last_name' => 'perez Turizo',
            'document_id' => 1,
            'document' => '1066739333',
            'address' => 'cll 41 # 6B - 14',
            'cell_phone' => '3006627582',
            'date_birthday' => '2017-09-01',
            'email' => 'juan@gmail.com',
            'city_id' => 2,
            'position_id' => 2,
            'state' => 1
        ]);

        Employee::create([
            'id' => 3,
            'first_name' => 'pedro',
            'last_name' => 'mendez',
            'document_id' => 1,
            'document' => '10667877863',
            'address' => 'cll 41 # 6B - 14',
            'cell_phone' => '3006627582',
            'date_birthday' => '2017-09-01',
            'email' => 'pedro@gmail.com',
            'city_id' => 1,
            'position_id' => 1,
            'state' => 1
        ]);

        Employee::create([
            'id' => 4,
            'first_name' => 'martin',
            'last_name' => 'Villabona',
            'document_id' => 1,
            'document' => '1066739863',
            'address' => 'cll 41 # 6B - 14',
            'cell_phone' => '3006627582',
            'date_birthday' => '2017-09-01',
            'email' => 'martin@gmail.com',
            'city_id' => 1,
            'position_id' => 3,
            'state' => 1
        ]);

        Employee::create([
            'id' => 5,
            'first_name' => 'janeth',
            'last_name' => 'Galvis',
            'document_id' => 1,
            'document' => '1123739863',
            'address' => 'cll 41 # 6B - 14',
            'cell_phone' => '3006627582',
            'date_birthday' => '2017-09-01',
            'email' => 'galvis@gmail.com',
            'city_id' => 1,
            'position_id' => 2,
            'state' => 1
        ]);
    }
}
