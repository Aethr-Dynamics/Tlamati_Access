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
        Schema::create('students', function (Blueprint $table) {
            $table->id('id_student')->unique();;
            $table->string('nombre', 255)->notNullable();
            $table->string('apellido_materno', 255)->notNullable();
            $table->string('apellido_paterno', 255)->notNullable();
            $table->foreignId('id_school')->notNullable()->references('id_school')->on('schools');
            $table->foreignId('id_rol')->notNullable()->references('id_rol')->on('rols');
            $table->foreignId('id_offer')->notNullable()->references('id_offer')->on('offers');
            $table->string('estado', 10)->notNullable()->default('1');
            $table->date('fecha_nacimiento')->notNullable();
            $table->longText('fotografia')->nullable();
            $table->string('code_qr', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};