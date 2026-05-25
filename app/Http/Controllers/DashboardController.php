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

        $start = $today->copy()->startOfWeek(Carbon::MONDAY)->startOfDay()->utc();// Lunes
        $end   = $today->copy()->endOfWeek(Carbon::SUNDAY)->endOfDay()->utc();    // Domingo    

        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

        // =========================================================
        // PRIMERA GRÁFICA
        // =========================================================

        $workerData  = array_fill(0, 7, 0);
        $studentData = array_fill(0, 7, 0);
        $visitorData = array_fill(0, 7, 0);

        $result = DB::table('incomes')
            ->selectRaw("
                DATE(created_at) as fecha,
                SUM(CASE WHEN con_worker = 1 THEN 1 ELSE 0 END) as workers,
                SUM(CASE WHEN con_student = 1 THEN 1 ELSE 0 END) as students,
                SUM(CASE WHEN con_visitor = 1 THEN 1 ELSE 0 END) as visitors
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
        // CONTADORES DEL DÍA
        // =========================================================

        // Obtener el último movimiento de cada usuario HOY
        $ultimosRegistros = DB::table('attendance_logs as al')
            ->select(
                'al.user_type',
                'al.id_student',
                'al.id_worker',
                'al.id_visitor',
                'al.action'
            )
            ->join(
                DB::raw('
                    (
                        SELECT
                            MAX(id) as ultimo_id
                        FROM attendance_logs
                        WHERE DATE(accessed_at) = CURRENT_DATE
                        GROUP BY
                            id_student,
                            id_worker,
                            id_visitor
                    ) as ultimos
                '),
                'al.id',
                '=',
                'ultimos.ultimo_id'
            )
            ->get();

        // Inicializar contadores
        $workerCount  = 0;
        $studentCount = 0;
        $visitorCount = 0;

        // Contar solamente usuarios cuya última acción fue "entry"
        foreach ($ultimosRegistros as $registro) {

            if ($registro->action === 'entry') {

                switch ($registro->user_type) {

                    case 'worker':
                        $workerCount++;
                        break;

                    case 'student':
                        $studentCount++;
                        break;

                    case 'visitor':
                        $visitorCount++;
                        break;
                }
            }
        }

        // =========================================================
        // SEGUNDA GRÁFICA
        // =========================================================
        $startCon = Carbon::now($tz)->startOfDay();
        $endCon   = Carbon::now($tz)->endOfDay();
        
        $ofertasData = DB::table('incomes as i')
            ->leftJoin('students as s', 'i.id_student', '=', 's.id')
            ->leftJoin('offers as o', 's.id_offer', '=', 'o.id')
            ->selectRaw("
                DATE(i.created_at) as fecha,
                o.id,
                o.nombre,
                COUNT(*) as total
            ")
            ->whereBetween('i.created_at', [$start, $end])
            ->whereNotNull('o.id')
            ->groupBy('fecha', 'o.id', 'o.nombre')
            ->orderBy('fecha')
            ->get();

        $offers = Offer::pluck('nombre', 'id');

        $dataset = [];

        foreach ($offers as $id => $nombre) {

            $data = array_fill(0, 7, 0);

            foreach ($ofertasData as $row) {
                if ($row->id == $id) {
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
            ->join('students as s', 'i.id_student', '=', 's.id')
            ->join('offers as o', 's.id_offer', '=', 'o.id')
            ->selectRaw("
                o.nombre as carrera,
                COUNT(*) as total
            ")
            ->whereBetween('i.created_at', [$startCon, $endCon])
            ->groupBy('o.nombre')
            ->orderByDesc('total')
            ->get();

        return view('index', [
            'dias'          => $dias,

            'studentCount'  => $studentCount,
            'workerCount'   => $workerCount,
            'visitorCount'  => $visitorCount,            

            'workerData'    => $workerData,
            'studentData'   => $studentData,
            'visitorData'   => $visitorData,

            'labels'        => $offers,
            'dataset'       => $dataset,

            'tablaCarreras' => $tablaCarreras,
        ]);
    }
}
