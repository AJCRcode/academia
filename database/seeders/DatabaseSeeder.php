<?php

namespace Database\Seeders;

use App\Models\Materia;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            MateriaSeeder::class,
        ]);

//        $docentes =User::factory(10)->create();
//        foreach ($docentes as $docente) {
//            $docente->assignRole('docente');
//            $docente->materias()->attach(Materia::all()->random());
//            $docente->materias()->attach(Materia::all()->random());
//        }
//
//        $estudiantes = User::factory(10)->create();
//
//        foreach ($estudiantes as $estudiante) {
//            $estudiante->assignRole('estudiante');
//            $estudiante->materias()->attach(Materia::all()->random());
//            $estudiante->materias()->attach(Materia::all()->random());
//            $estudiante->materias()->attach(Materia::all()->random());
//            $estudiante->materias()->attach(Materia::all()->random());
//            $estudiante->materias()->attach(Materia::all()->random());
//            $estudiante->materias()->attach(Materia::all()->random());
//        }

        $admin=User::factory()->create([
          'name' => 'admin ',
          'email' => 'admin@admin.com',
          'password' => Hash::make('admin'),
        ]);
        $admin->assignRole('admin');
    }
}
