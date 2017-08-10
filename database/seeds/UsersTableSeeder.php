<?php

use Illuminate\Database\Seeder;
use App\Funpacol\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'jeaffer villadiego',
            'email' => 'jeyferv@gmail.com',
            'first_name' => 'jeaffer',
            'last_name' => 'villadiego',
            'password' => bcrypt('123456'),
            'city_id' => 2,
            'state' => 1,
        ]);
    }
}
