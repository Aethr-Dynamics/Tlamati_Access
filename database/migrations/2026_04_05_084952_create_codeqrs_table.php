<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('codeqrs', function (Blueprint $table) {
            $table->id()->unique();

            $table->foreignId('id_student')->constrained('students');
            $table->foreignId('id_worker')->constrained('workers');
            $table->foreignId('id_visitor')->constrained('visitors');

            $table->longText('codeqr')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};