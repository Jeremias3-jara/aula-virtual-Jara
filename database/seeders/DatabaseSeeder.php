<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Recurso;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory()->create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => bcrypt('123456'),
        ]);

        Recurso::create([
            'nombre' => 'Proyector Aula 1',
            'descripcion' => 'Proyector HD en el aula 1',
        ]);
    }
}
 