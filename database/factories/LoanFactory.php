<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Book;

class LoanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'book_id' => Book::factory(),
            'fecha_prestamo' => now(),
            'fecha_devolucion_estimada' => now()->addDays(14)->toDateString(),
            'fecha_devolucion_real' => null,
            'estado' => 'prestado',
        ];
    }
}
