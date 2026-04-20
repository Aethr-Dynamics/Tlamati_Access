<?php
namespace App\Http\Controllers;

use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // ----------------------------------------
        // CONFIGURACIÓN DE SEMANA
        // ----------------------------------------
        // TODO se calcule en zona horaria de México (America/Mexico_City) aunque el servidor esté en UTC.
        $tz    = 'America/Mexico_City';
        $today = Carbon::now($tz);

        $start = $today->copy()->startOfWeek(Carbon::MONDAY)->startOfDay(); // Lunes
        $end   = $today->copy()->endOfWeek(Carbon::SUNDAY)->endOfDay();     // Domingo

        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

        // =========================================================
        // PRIMERA GRÁFICA (OPTIMIZADA Y CORREGIDA)
        // =========================================================

        $workerData  = array_fill(0, 7, 0);
        $studentData = array_fill(0, 7, 0);
        $visitorData = array_fill(0, 7, 0);

        $result = DB::table('incomes')
            ->selectRaw("
                DATE(created_at) as fecha,
                SUM(CASE WHEN worker = 1 THEN 1 ELSE 0 END) as workers,
                SUM(CASE WHEN student = 1 THEN 1 ELSE 0 END) as students,
                SUM(CASE WHEN visitor = 1 THEN 1 ELSE 0 END) as visitors
            ")
            ->whereBetween('created_at', [$start, $end])
            ->groupByRaw('DATE(created_at)')
            ->orderBy('fecha')
            ->get();

        foreach ($result as $row) {
            $index = Carbon::parse($row->fecha)->dayOfWeekIso - 1;
            if ($index >= 0 && $index < 7) {
                $workerData[$index]  = (int) $row->workers;
                $studentData[$index] = (int) $row->students;
                $visitorData[$index] = (int) $row->visitors;
            }
        }

        // =========================================================
        // CONTADORES DEL DÍA (CORREGIDO)
        // =========================================================

        $counts = DB::table('incomes')
            ->selectRaw("
                SUM(CASE WHEN worker = 1 THEN 1 ELSE 0 END) as workers,
                SUM(CASE WHEN student = 1 THEN 1 ELSE 0 END) as students,
                SUM(CASE WHEN visitor = 1 THEN 1 ELSE 0 END) as visitors
            ")
            ->whereDate('created_at', $end)
            ->first();

        // =========================================================
        // SEGUNDA GRÁFICA (SIN CAMBIOS GRANDES)
        // =========================================================

        $ofertasData = DB::table('incomes as i')
            ->join('students as s', 'i.id_student', '=', 's.id_student')
            ->join('offers as o', 's.id_offer', '=', 'o.id_offer')
            ->selectRaw("
                DATE(i.created_at) as fecha,
                o.id_offer,
                o.nombre,
                COUNT(*) as total
            ")
            ->whereBetween('i.created_at', [$start, $end])
            ->groupBy('fecha', 'o.id_offer', 'o.nombre')
            ->orderBy('fecha')
            ->get();

        $offers = Offer::pluck('nombre', 'id_offer');

        $dataset = [];

        foreach ($offers as $id => $nombre) {

            $data = array_fill(0, 7, 0);

            foreach ($ofertasData as $row) {
                if ($row->id_offer == $id) {
                    $index = Carbon::parse($row->fecha)->dayOfWeekIso - 1;

                    if ($index >= 0 && $index < 7) {
                        $data[$index] = $row->total;
                    }
                }
            }

            $dataset[] = [
                'label'           => $nombre,
                'data'            => $data,
                'borderWidth'     => 1,
                'backgroundColor' => 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ',0.6)',
            ];
        }

        // =========================================================
        // TABLA
        // =========================================================

        $tablaCarreras = DB::table('incomes as i')
            ->join('students as s', 'i.id_student', '=', 's.id_student')
            ->join('offers as o', 's.id_offer', '=', 'o.id_offer')
            ->selectRaw("
                o.nombre as carrera,
                COUNT(*) as total
            ")
            ->whereBetween('i.created_at', [$start, $end])
            ->groupBy('carrera')
            ->orderByDesc('total')
            ->get();

        return view('index', [
            'dias'          => $dias,

            'studentCount'  => (int) $counts->students,
            'workerCount'   => (int) $counts->workers,
            'visitorCount'  => (int) $counts->visitors,

            'workerData'    => $workerData,
            'studentData'   => $studentData,
            'visitorData'   => $visitorData,

            'labels'        => $offers,
            'dataset'       => $dataset,

            'tablaCarreras' => $tablaCarreras,
        ]);
    }
}
