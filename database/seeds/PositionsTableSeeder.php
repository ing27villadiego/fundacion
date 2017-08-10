<?php

use Illuminate\Database\Seeder;
use App\Funpacol\Entities\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'id' => 1,
            'name' => 'Promotor',
            'slug' => 'promotor'
        ]);

        Position::create([
            'id' => 2,
            'name' => 'Asesor',
            'slug' => 'asesor'
        ]);

        Position::create([
            'id' => 3,
            'name' => 'Mensajero',
            'slug' => 'mensajero'
        ]);

        Position::create([
            'id' => 4,
            'name' => 'Secretaria',
            'slug' => 'secretaria'
        ]);

        Position::create([
            'id' => 5,
            'name' => 'Gerente',
            'slug' => 'gerente'
        ]);
    }
}
