<?php
namespace App\Http\Controllers;

use App\Http\Requests\VisitorRequest;
use App\Models\AttendanceLog;
use App\Models\Visitor;
use App\Services\VisitorAttendanceService;
use App\Services\VisitorQrService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View; // Genera el QR

class VisitorController extends Controller
{
    protected $qrService;
    protected $attendanceService;

    public function __construct(
        VisitorQrService $qrService,
        VisitorAttendanceService $attendanceService
    ) {
        $this->qrService         = $qrService;
        $this->attendanceService = $attendanceService;
    }

    /**
     * Lista
     */
    public function index(Request $request): View
    {
        // Zona horaria México
        $tz = 'America/Mexico_City';

        // Inicio y fin del día
        $start = Carbon::now($tz)->startOfDay();
        $end   = Carbon::now($tz)->endOfDay();

        /**
         * IDs de visitantes con acceso HOY
         */
        $visitorIds = AttendanceLog::where('user_type', 'visitor')
            ->whereBetween('accessed_at', [$start, $end])
            ->whereNotNull('id_visitor')
            ->pluck('id_visitor')
            ->unique();

        /**
         * Obtener visitantes
         */
        $visitors = Visitor::whereIn('id', $visitorIds)
            ->orderByDesc('updated_at')
            ->paginate(10);

        return view('visitor.index', compact('visitors'))
            ->with(
                'i',
                ($request->input('page', 1) - 1)
                 * $visitors->perPage()
            );
    }

    /**
     * Formulario
     */
    public function create(): View
    {
        $visitor = new Visitor();

        return view('visitor.create', compact('visitor'));
    }

    /**
     * Guardar
     */
    public function store(VisitorRequest $request): RedirectResponse {

        DB::beginTransaction();

        try {
            // Crear visitante
            $visitor = Visitor::create([
                'nombre'            => $request->nombre,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'motivo'           => $request->motivo,
                'es_menor'         => $request->es_menor,
                'identificacion'   => $request->identificacion,
            ]);

            /**
             * Generar QR
             */
            $qrPath = $this->qrService
                ->generateQrFile($visitor);

            /**
             * Actualizar path QR
             */
            $visitor->update([
                'code_qr' => $qrPath,
            ]);

            /**
             * Registrar entrada
             */
            $this->attendanceService
                ->registerEntry($visitor);

            DB::commit();

            return Redirect::route('visitor.index')
                ->with(
                    'success',
                    'Visitante registrado correctamente.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return Redirect::back()
                ->withInput()
                ->with(
                    'error',
                    'Error al registrar visitante: '
                    . $e->getMessage()
                );
        }
    }

    /**
     * Mostrar
     */
    public function show(Visitor $visitor): View
    {
        return view('visitor.show', compact('visitor'));
    }

    /**
     * Editar
     */
    public function edit(Visitor $visitor): View
    {
        return view('visitor.edit', compact('visitor'));
    }

    /**
     * Actualizar
     */
    public function update(
        VisitorRequest $request,
        Visitor $visitor
    ): RedirectResponse {

        $visitor->update([
            'nombre'           => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'motivo'           => $request->motivo,
            'es_menor'         => $request->es_menor,
            'identificacion'   => $request->identificacion,
        ]);

        return Redirect::route('visitor.index')
            ->with(
                'success',
                'Visitante actualizado correctamente.'
            );
    }

    /**
     * Eliminar
     */
    public function destroy(
        Visitor $visitor
    ): RedirectResponse {

        $visitor->delete();

        return Redirect::route('visitor.index')
            ->with(
                'success',
                'Visitante eliminado correctamente.'
            );
    }

}
