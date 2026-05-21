<?php

// database/migrations/xxxx_xx_xx_add_indexes_to_workers_students_visitors.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Ya existen índices únicos, pero los reforzamos
        Schema::table('students', function (Blueprint $table) {
            $table->index('id_institucional'); // ya es unique → index implícito
        });
        Schema::table('workers', function (Blueprint $table) {
            $table->index('id_institucional');
        });
        Schema::table('visitors', function (Blueprint $table) {
            $table->index('id_visitante');
        });
        // Índices para las llaves foráneas en incomes (opcional, ya las crea foreignId)
        Schema::table('incomes', function (Blueprint $table) {
            $table->index('id_student');
            $table->index('id_worker');
            $table->index('id_visitor');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropIndex(['id_institucional']);
        });
        Schema::table('workers', function (Blueprint $table) {
            $table->dropIndex(['id_institucional']);
        });
        Schema::table('visitors', function (Blueprint $table) {
            $table->dropIndex(['id_visitante']);
        });
        Schema::table('incomes', function (Blueprint $table) {
            $table->dropIndex(['id_student']);
            $table->dropIndex(['id_worker']);
            $table->dropIndex(['id_visitor']);
        });
    }
};