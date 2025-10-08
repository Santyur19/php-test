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
            'loan_date' => now(),
            'stimated_delivery_date' => now()->addDays(14)->toDateString(),
            'delivery_date' => null,
            'status' => 'prestado',
        ];
    }
}
