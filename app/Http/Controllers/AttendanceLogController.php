<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AttendanceLogRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;

class AttendanceLogController extends Controller
{
    /**
     * Mostrar listado único por usuario
     * mostrando solamente el registro más reciente del día.
     */
    public function index(Request $request): View
    {
        // Zona horaria México
        $tz = 'America/Mexico_City';

        // Inicio y fin del día
        $start = Carbon::now($tz)->startOfDay();
        $end   = Carbon::now($tz)->endOfDay();

        // =========================================================
        // OBTENER SOLO EL ÚLTIMO REGISTRO DEL DÍA POR USUARIO
        // =========================================================

        $subquery = AttendanceLog::selectRaw('MAX(id) as id')
            ->whereBetween('accessed_at', [$start, $end])
            ->groupBy(
                'id_student',
                'id_worker',
                'id_visitor'
            );

        $attendanceLogs = AttendanceLog::with([
                'student.school',
                'student.rol',
                'student.offer',

                'worker.school',
                'worker.rol',
                'worker.offer',

                'visitor'
            ])
            ->whereIn('id', $subquery)
            ->orderByDesc('accessed_at')
            ->paginate();

        // =========================================================
        // TRANSFORMAR DATOS PARA LA VISTA
        // =========================================================

        $attendanceLogs->getCollection()->transform(function ($log) {

            // =========================================
            // STUDENT
            // =========================================
            if ($log->id_student && $log->student) {

                $log->full_name =
                    $log->student->nombre . ' ' .
                    $log->student->apellido_paterno . ' ' .
                    $log->student->apellido_materno;

                $log->photo =
                    $log->student->fotografia_path
                    ? asset('storage/' . $log->student->fotografia_path)
                    : null;
            }

            // =========================================
            // WORKER
            // =========================================
            elseif ($log->id_worker && $log->worker) {

                $log->full_name =
                    $log->worker->nombre . ' ' .
                    $log->worker->apellido_paterno . ' ' .
                    $log->worker->apellido_materno;

                $log->photo =
                    $log->worker->fotografia_path
                    ? asset('storage/' . $log->worker->fotografia_path)
                    : null;
            }

            // =========================================
            // VISITOR
            // =========================================
            elseif ($log->id_visitor && $log->visitor) {

                $log->full_name =
                    $log->visitor->nombre . ' ' .
                    $log->visitor->apellido_paterno . ' ' .
                    ($log->visitor->apellido_materno ?? '');

                // Icono por defecto visitante
                $log->photo = null;
            }

            return $log;
        });

        return view('attendance-log.index', compact('attendanceLogs'))
            ->with(
                'i',
                ($request->input('page', 1) - 1)
                * $attendanceLogs->perPage()
            );
    }

    /**
     * Formulario crear
     */
    public function create(): View
    {
        $attendanceLog = new AttendanceLog();

        return view('attendance-log.create', compact('attendanceLog'));
    }

    /**
     * Guardar
     */
    public function store(AttendanceLogRequest $request): RedirectResponse
    {
        AttendanceLog::create($request->validated());

        return Redirect::route('attendance-log.index')
            ->with('success', 'AttendanceLog created successfully.');
    }
/**
 * Mostrar detalle completo
 */
public function show($id): View
{
    $attendanceLog = AttendanceLog::with([
        'student.school',
        'student.rol.department',
        'student.offer',

        'worker.school',
        'worker.rol.department',
        'worker.offer',

        'visitor'
    ])->findOrFail($id);

    // =========================================================
    // DETERMINAR TIPO DE USUARIO
    // =========================================================

    $userType = null;
    $userId = null;

    if (!is_null($attendanceLog->id_student)) {

        $userType = 'student';
        $userId = $attendanceLog->id_student;

    } elseif (!is_null($attendanceLog->id_worker)) {

        $userType = 'worker';
        $userId = $attendanceLog->id_worker;

    } elseif (!is_null($attendanceLog->id_visitor)) {

        $userType = 'visitor';
        $userId = $attendanceLog->id_visitor;
    }

    // =========================================================
    // HISTORIAL DE ACCESOS
    // =========================================================

    $attendanceHistory = collect();
    $isInside = false;

    if ($userId && $userType) {

        $query = AttendanceLog::query();

        if ($userType === 'student') {

            $query->where('id_student', $userId);

        } elseif ($userType === 'worker') {

            $query->where('id_worker', $userId);

        } elseif ($userType === 'visitor') {

            $query->where('id_visitor', $userId);
        }

        $logs = $query
            ->orderBy('accessed_at', 'desc')
            ->get();

        // =========================================================
        // FORMATEAR HISTORIAL
        // =========================================================

        $attendanceHistory = $logs->map(function ($log) {

            return [
                'date' => Carbon::parse($log->accessed_at)
                    ->timezone('America/Mexico_City')
                    ->format('d/m/Y'),

                'time' => Carbon::parse($log->accessed_at)
                    ->timezone('America/Mexico_City')
                    ->format('H:i:s'),

                'action' => $log->action,

                'timestamp' => Carbon::parse($log->accessed_at)
                    ->timezone('America/Mexico_City')
                    ->format('Y-m-d H:i:s'),
            ];
        });

        // =========================================================
        // ESTADO ACTUAL
        // =========================================================

        $lastLog = $logs->first();

        if ($lastLog) {

            $isInside = $lastLog->action === 'entry';
        }
    }

    return view(
        'attendance-log.show',
        compact(
            'attendanceLog',
            'attendanceHistory',
            'userType',
            'userId',
            'isInside'
        )
    );
}

    /**
     * Editar
     */
    public function edit($id): View
    {
        $attendanceLog = AttendanceLog::findOrFail($id);

        return view('attendance-log.edit', compact('attendanceLog'));
    }

    /**
     * Actualizar
     */
    public function update(
        AttendanceLogRequest $request,
        AttendanceLog $attendanceLog
    ): RedirectResponse
    {
        $attendanceLog->update($request->validated());

        return Redirect::route('attendance-log.index')
            ->with('success', 'AttendanceLog updated successfully');
    }

    /**
     * Eliminar
     */
    public function destroy($id): RedirectResponse
    {
        AttendanceLog::findOrFail($id)->delete();

        return Redirect::route('attendance-log.index')
            ->with('success', 'AttendanceLog deleted successfully');
    }
}