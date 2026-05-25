<?php

namespace App\Services;

use App\Models\AttendanceLog;
use App\Models\Income;
use App\Models\Visitor;

class VisitorAttendanceService
{
    public function registerEntry(Visitor $visitor): void
    {
        /**
         * Registrar ingreso
         */
        Income::create([
            'con_worker'  => null,
            'con_student' => null,
            'con_visitor' => 1,

            'id_student'  => null,
            'id_worker'   => null,
            'id_visitor'  => $visitor->id,
        ]);

        /**
         * Bitácora
         */
        AttendanceLog::create([
            'user_type'   => 'visitor',

            'id_student'  => null,
            'id_worker'   => null,
            'id_visitor'  => $visitor->id,

            'action'      => 'entry',
            'accessed_at' => now(),
        ]);

        /**
         * Agregar fecha impresión/acceso
         */
        $dates = $visitor->fechas_impresion ?? [];

        $dates[] = now()->toDateTimeString();

        $visitor->update([
            'fechas_impresion' => $dates
        ]);
    }
}