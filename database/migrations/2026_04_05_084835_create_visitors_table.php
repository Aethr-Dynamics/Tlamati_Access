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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('id_visitante', 20)->unique();
            $table->string('nombre', 255)->notNullable();
            $table->string('apellido_paterno', 255)->notNullable();
            $table->string('apellido_materno', 255)->nullable();
            $table->text('motivo')->notNullable();
            $table->tinyInteger('es_menor')->default(0);  // Cambiado de "menor" a "es_menor"
            $table->string('identificacion', 255);
            $table->string('code_qr', 500);
            $table->tinyInteger('reactivacion')->default(0);
            $table->json('fechas_impresion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};