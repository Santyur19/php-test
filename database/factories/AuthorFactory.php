<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => fake()->firstName(),
            'apellido' => fake()->lastName(),
            'fecha_nacimiento' => fake()->date(),
            'nacionalidad' => fake()->country(),
            'biografia' => fake()->paragraph(),
        ];
    }
}
