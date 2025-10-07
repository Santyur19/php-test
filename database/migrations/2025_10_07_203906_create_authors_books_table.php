<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('authors_books', function (Blueprint $table) {
            $table->foreignId('author_id')->references("id")->on("authors");
            $table->foreignId('book_id')->references("id")->on("books");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors_books');
    }
};
