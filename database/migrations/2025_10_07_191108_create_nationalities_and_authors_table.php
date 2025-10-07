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
        Schema::create('nacionalities', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("code");
            $table->string("flag_url");
        });

        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string("firstName");
            $table->string("lastName");
            $table->string("biography");
            $table->date("birth");
            $table->foreignId('nacionality_id')->constrained("nacionalities")->index();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nacionalities');
        Schema::dropIfExists('authors');
    }
};
