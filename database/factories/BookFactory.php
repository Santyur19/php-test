<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'isbn' => fake()->unique()->isbn13(),
            'published' => fake()->numberBetween(1950, 2025),
            2025,
            'pages' => fake()->numberBetween(80, 1200),
            1200,
            'description' => fake()->paragraph(2),
            'stock' => fake()->numberBetween(0, 10),
            10,
        ];
    }
}
