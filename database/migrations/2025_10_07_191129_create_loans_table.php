<?php
use App\LoanStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->date('loan_date')->default(Date::now());
            $table->date('stimated_delivery_date');
            $table->date('delivery_date');
            $table->enum('status', LoanStatus::cases());
            $table->foreignId('user_id')->references("id")->on("users");
            $table->foreignId('book_id')->references("id")->on("books");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
