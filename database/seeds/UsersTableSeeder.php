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
            'password' => bcrypt('123456'),
            'city_id' => 1,
            'state' => 1,
        ]);
    }
}
