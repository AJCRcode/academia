<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'fecha_inicio' => $this->faker->date(),
            'horario' => $this->faker->time(),
            'fecha_fin' => $this->faker->date(),
            'gestion' => $this->faker->randomElement(['Prefas', '1er año', '2do año', '3er año', '4to año','5to año']),
        ];
    }
}
