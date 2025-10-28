<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aula;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aula::create([

            'nombre' => 'Maker', 
            'ubicacion' => 'secundaria de innovacion',
            'capacidad' =>'35',

        ]);
    }
}
