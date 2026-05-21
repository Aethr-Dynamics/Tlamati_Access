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
        Schema::create('workers', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('id_institucional', 9)->unique();
            $table->string('email_institucional')->unique();
            $table->string('nombre', 255)->notNullable();
            $table->string('apellido_materno', 255)->notNullable();
            $table->string('apellido_paterno', 255)->notNullable();
            
            $table->foreignId('id_school')->constrained('schools');
            $table->foreignId('id_rol')->constrained('rols');
            $table->foreignId('id_offer')->constrained('offers');
            
            $table->string('estado', 10)->notNullable()->default('ACTIVO');
            $table->longText('fotografia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};