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
            $table->id();

            $table->foreignId('id_student')->nullable()->constrained('students');
            $table->foreignId('id_worker')->nullable()->constrained('workers');
            $table->foreignId('id_visitor')->nullable()->constrained('visitors');

            /** Token Aleatorio:
             * Reemplaza el ID en el QR.
             * Es un string aleatorio que no revela la matrícula.
             */
            $table->string('access_token', 64)->unique();

            /** 
             * Hash criptográfico (SHA-256):
             * Para verificar integridad y revocar sin borrar todo.
             */
            $table->string('token_hash', 256)->nullable();

            /**
             * Estado de revocación
             * Permite bloquear el acceso a un usuario específico sin eliminar su registro.
             */
            $table->boolean('is_revoked')->default(false);

            // Guarda la ruta de la imagen
            $table->longText('qr_image')->nullable();


            $table->timestamps(); // created_at y updated_at

            // Índices para búsquedas rápidas
            $table->index(['id_student']);
            $table->index(['id_worker']);
            $table->index(['id_visitor']);
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