<?php

use Illuminate\Database\Seeder;

use App\Funpacol\Entities\Document;
class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::create([
            'id' => 1,
            'name' => 'C.C'
        ]);

        Document::create([
            'id' => 2,
            'name' => 'C.E'
        ]);

        Document::create([
            'id' => 3,
            'name' => 'T.I'
        ]);

        Document::create([
            'id' => 4,
            'name' => 'Pasaporte'
        ]);

        Document::create([
            'id' => 5,
            'name' => 'Nit'
        ]);

        Document::create([
            'id' => 6,
            'name' => 'Rut'
        ]);
    }
}
