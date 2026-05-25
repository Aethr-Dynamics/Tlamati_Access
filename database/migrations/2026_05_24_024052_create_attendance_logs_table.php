<?php
// database/migrations/2024_XX_XX_create_attendance_logs_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración.
     */
    public function up(): void
    {
        Schema::create('attendance_logs', function (Blueprint $table) {
            $table->id();
            
            // Tipo de usuario para referencia rápida
            $table->string('user_type')->nullable()->default('student'); 
            
            // Referencia al usuario específico (FK)
            $table->foreignId('id_student')->nullable()->constrained('students')->onDelete('cascade');
            $table->foreignId('id_worker')->nullable()->constrained('workers')->onDelete('cascade');
            $table->foreignId('id_visitor')->nullable()->constrained('visitors')->onDelete('cascade');

            // Acción registrada: 'entry' (entrada) o 'exit' (salida)
            $table->string('action', 10)->default('entry'); 
            
            // Fecha y hora del evento
            $table->timestamp('accessed_at')->useCurrent();

            // Opcional: Ubicación GPS si se desea implementar luego
            // $table->decimal('latitude', 10, 8); 
            // $table->decimal('longitude', 10, 8); 

            $table->timestamps();
            
            // Índice para búsquedas rápidas por usuario y fecha
            $table->index(['id_student', 'accessed_at']);
        });
    }

    /**
     * Invierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_logs');
    }
};
