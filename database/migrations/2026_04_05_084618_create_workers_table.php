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

            $table->string('id_institucional', 9)->unique(); // Mantener
            $table->string('email_institucional')->unique(); // Permitir null si no tiene aún
            $table->string('nombre', 255)->notNullable();
            $table->string('apellido_materno', 255)->notNullable();
            $table->string('apellido_paterno', 255)->notNullable();

            // Alergias y Salud
            $table->json('alergias')->nullable(); // Usar JSON para múltiples alergias (ej: ["Peanuts", "Penicilina"])
            $table->string('tipo_sangre', 10)->nullable()->default(null); 
            $table->date('fecha_nacimiento')->notNullable();
            $table->string('telefono_emergencia', 20)->nullable(); // Formato flexible

            // Relaciones
            $table->foreignId('id_school')->constrained('schools');
            $table->foreignId('id_rol')->constrained('rols');
            $table->foreignId('id_offer')->constrained('offers');

            // Estado y Seguridad
            $table->string('estado', 10)->notNullable()->default('activo'); // Valores: activo, inactivo, suspendido

            // Foto (Recomendado guardar ruta en lugar de base64)
            $table->string('fotografia_path', 255)->nullable(); 

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