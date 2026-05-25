<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceHistoryController extends Controller
{
    /**
     * Devuelve el historial de accesos para un usuario específico.
     */
    public function show($id)
    {
        $userType = request('type', 'student'); // student, worker, visitor

        switch ($userType) {
            case 'student':
                $logs = AttendanceLog::where('id_student', $id)->orderByDesc('accessed_at')->get();
                break;
            case 'worker':
                $logs = AttendanceLog::where('id_worker', $id)->orderByDesc('accessed_at')->get();
                break;
            case 'visitor':
                $logs = AttendanceLog::where('id_visitor', $id)->orderByDesc('accessed_at')->get();
                break;
            default:
                return response()->json(['error' => 'Tipo de usuario no válido'], 400);
        }

        // Agrupar por fecha y hora para facilitar la lectura
        $history = AttendanceLog::where(function($query) use ($id, $userType) {
            if ($userType === 'student') $query->where('id_student', $id);
            elseif ($userType === 'worker') $query->where('id_worker', $id);
            else $query->where('id_visitor', $id);
        })
        ->orderByDesc('accessed_at')
        ->get()
        ->map(function($log) {
            return [
                'date' => $log->accessed_at->format('Y-m-d'),
                'time' => $log->accessed_at->format('H:i:s'),
                'action' => $log->action,
                'timestamp' => $log->accessed_at->toDateTimeString(),
            ];
        });

        return response()->json([
            'success' => true,
            'user_id' => $id,
            'type' => $userType,
            'history' => $history,
        ]);
    }

    /**
     * Exporta el historial en formato JSON para descarga.
     */
    public function export(Request $request)
    {
        $userId = $request->input('id');
        $userType = $request->input('type', 'student');
        $startDate = $request->input('start_date', now()->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->format('Y-m-d'));

        $logs = AttendanceLog::where(function($query) use ($userId, $userType) {
            if ($userType === 'student') $query->where('id_student', $userId);
            elseif ($userType === 'worker') $query->where('id_worker', $userId);
            else $query->where('id_visitor', $userId);
        })
        ->whereBetween('accessed_at', [$startDate, $endDate])
        ->orderByDesc('accessed_at')
        ->get();

        return response()->json([
            'success' => true,
            'count' => $logs->count(),
            'data' => $logs->map(function($log) {
                return [
                    'date' => $log->accessed_at->format('Y-m-d'),
                    'time' => $log->accessed_at->format('H:i:s'),
                    'action' => $log->action,
                    'timestamp' => $log->accessed_at->toDateTimeString(),
                ];
            }),
        ]);
    }

    public function getStatus($id)
    {
        $userType = request('type', 'student');
        
        $lastLog = AttendanceLog::where(function($query) use ($id, $userType) {
            if ($userType === 'student') $query->where('id_student', $id);
            elseif ($userType === 'worker') $query->where('id_worker', $id);
            else $query->where('id_visitor', $id);
        })
        ->orderByDesc('accessed_at')
        ->first();

        return response()->json([
            'success' => true,
            'user_id' => $id,
            'is_inside' => $lastLog && $lastLog->action === 'entry',
            'last_action' => $lastLog ? $lastLog->action : null,
            'last_accessed_at' => $lastLog ? $lastLog->accessed_at->toDateTimeString() : null,
        ]);
    }


}
