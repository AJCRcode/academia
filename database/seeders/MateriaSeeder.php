<?php

namespace Database\Seeders;

use App\Models\Materia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Materia::factory()->create(['nombre' => 'Anatomía']);
        Materia::factory()->create(['nombre' => 'Fisiología']);
        Materia::factory()->create(['nombre' => 'Fisiopatología']);
        Materia::factory()->create(['nombre' => 'Embriología']);
        Materia::factory()->create(['nombre' => 'Histología']);
        Materia::factory()->create(['nombre' => 'Biología']);
        Materia::factory()->create(['nombre' => 'Cirugía']);
        Materia::factory()->create(['nombre' => 'Pediatría']);
        Materia::factory()->create(['nombre' => 'Farmacología']);
        Materia::factory()->create(['nombre' => 'Microbiología']);
        Materia::factory()->create(['nombre' => 'Psicología Médica']);
    }
}
