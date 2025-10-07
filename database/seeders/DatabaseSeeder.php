<?php

namespace Database\Seeders;

use App\UserStatus;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'phone' => '1234567',
            'status' => UserStatus::ENABLED,
        ]);

        Author::factory(10)->create();
        Book::factory(20)->create()->each(function ($book) {
            $authors = Author::inRandomOrder()->take(rand(1, 3))->pluck('id')->toArray();
            $book->authors()->sync($authors);
        });

        Loan::factory(5)->create();
    }
}
