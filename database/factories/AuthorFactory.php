<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'firstName' => fake()->firstName(),
            'lastName' => fake()->lastName(),
            'birth' => fake()->date(),
            'nationality_id' => null,
            'biography' => fake()->paragraph(),
        ];
    }
}
