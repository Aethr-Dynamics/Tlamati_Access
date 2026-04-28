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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id()->unique();
            
            $table->integer('con_worker')->nullable();
            $table->integer('con_student')->nullable();
            $table->integer('con_visitor')->nullable();

            $table->foreignId('id_student')->nullable()->constrained('students');
            $table->foreignId('id_worker')->nullable()->constrained('workers');
            $table->foreignId('id_visitor')->nullable()->constrained('visitors');

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