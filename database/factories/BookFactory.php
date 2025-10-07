<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(3),
            'isbn' => fake()->unique()->isbn13(),
            'anio_publicacion' => fake()->numberBetween(1950, 2025),
            'numero_paginas' => fake()->numberBetween(80, 1200),
            'descripcion' => fake()->paragraph(2),
            'stock_disponible' => fake()->numberBetween(0, 10),
        ];
    }
}
