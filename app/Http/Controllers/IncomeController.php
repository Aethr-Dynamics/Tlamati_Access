<?php
namespace App\Http\Controllers;

use App\Http\Requests\IncomeRequest;
use App\Models\AttendanceLog;
use App\Models\Income;
use App\Models\Student;
use App\Models\Visitor;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * Controlador para gestionar las entradas financieras.
 *
 * Este controlador proporciona métodos para crear, mostrar, editar y eliminar
 * registros de ingresos financieros, validando que solo uno de los tipos (worker,
 * student o visitor) esté seleccionado en la solicitud. Además, incluye protección
 * contra inyecciones SQL mediante el uso de consultas preparadas.
 */
class IncomeController extends Controller
{
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

        $subquery = Income::selectRaw('
            MAX(id) as id
        ')
            ->whereBetween('created_at', [$start, $end])
            ->groupBy(
                'id_student',
                'id_worker',
                'id_visitor'
            );

        $incomes = Income::whereIn('id', $subquery)
            ->orderByDesc('created_at')
            ->paginate(10);

        // Retornar vista
        return view('income.index', compact('incomes'))
            ->with(
                'i',
                ($request->input('page', 1) - 1) * $incomes->perPage()
            );
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return View Una vista con el formulario de creación.
     */
    public function create(): View
    {
        // Crea una instancia vacía del modelo Income
        $income = new Income();

        // Devuelve la vista 'income.create' con el formulario de creación
        return view('income.create', compact('income'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     *
     * @param IncomeRequest $request La solicitud HTTP con los datos del ingreso financiero.
     * @return RedirectResponse Una redirección a la lista de ingresos financieros con un mensaje de éxito.
     */
    public function store(IncomeRequest $request): RedirectResponse
    {
        // Valida los datos recibidos
        $data = $request->validated();

        // Cuenta cuántos IDs vienen con valor
        $filled = collect([
            'id_worker'  => $data['id_worker'] ?? null,
            'id_student' => $data['id_student'] ?? null,
            'id_visitor' => $data['id_visitor'] ?? null,
        ])->filter(fn($v) => ! is_null($v) && $v !== '');

        // Valida que solo uno de los IDs esté seleccionado
        if ($filled->count() > 1) {
            return back()
                ->withErrors(['error' => 'Solo puedes registrar un tipo: worker, student o visitor'])
                ->withInput();
        }

        // Valida que al menos uno de los IDs esté seleccionado
        if ($filled->count() === 0) {
            return back()
                ->withErrors(['error' => 'Debes ingresar al menos un ID'])
                ->withInput();
        }

        // Inicializa todos en null
        $data['con_worker']  = null;
        $data['con_student'] = null;
        $data['con_visitor'] = null;

        // Asigna automáticamente el con_
        if (! empty($data['id_worker'])) {
            $data['con_worker'] = 1;
            $data['id_student'] = null;
            $data['id_visitor'] = null;
        }

        if (! empty($data['id_student'])) {
            $data['con_student'] = 1;
            $data['id_worker']   = null;
            $data['id_visitor']  = null;
        }

        if (! empty($data['id_visitor'])) {
            $data['con_visitor'] = 1;
            $data['id_worker']   = null;
            $data['id_student']  = null;
        }

        // Crea el ingreso financiero en la base de datos
        Income::create($data);

        // Redirige al usuario a la lista de ingresos financieros con un mensaje de éxito
        return Redirect::route('income.index')
            ->with('success', 'Income creado correctamente.');
    }

    /**
     * Muestra los detalles de un recurso especificado.
     *
     * @param Income $income El ingreso financiero que se va a mostrar.
     * @return View Una vista con los detalles del ingreso financiero.
     */
    public function show(Income $income): View
    {
        // Determinar el tipo de usuario basado en los campos registrados
        $userType = null;
        $userId   = null;

        if ($income->con_student) {
            $userType = 'student';
            $userId   = $income->id_student;
        } elseif ($income->con_worker) {
            $userType = 'worker';
            $userId   = $income->id_worker;
        } elseif ($income->con_visitor) {
            $userType = 'visitor';
            $userId   = $income->id_visitor;
        }

        // Obtener historial de accesos (si existe usuario asociado)
        $attendanceHistory = null;
        if ($userId && $userType) {
            $logs = AttendanceLog::where(function ($query) use ($userId, $userType) {
                if ($userType === 'student') {
                    $query->where('id_student', $userId);
                } elseif ($userType === 'worker') {
                    $query->where('id_worker', $userId);
                } else {
                    $query->where('id_visitor', $userId);
                }

            })
                ->orderByDesc('accessed_at')
                ->get();

            // Convertir a formato JSON para mostrar en la vista
            $attendanceHistory = $logs->map(function ($log) {
                return [
                    'date'      => $log->accessed_at->format('Y-m-d'),
                    'time'      => $log->accessed_at->format('H:i:s'),
                    'action'    => $log->action,
                    'timestamp' => $log->accessed_at->toDateTimeString(),
                ];
            });

            // Obtener estado actual (si está dentro o afuera)
            $lastLog = AttendanceLog::where(function ($query) use ($userId, $userType) {
                if ($userType === 'student') {
                    $query->where('id_student', $userId);
                } elseif ($userType === 'worker') {
                    $query->where('id_worker', $userId);
                } else {
                    $query->where('id_visitor', $userId);
                }

            })
                ->orderByDesc('accessed_at')
                ->first();

            $isInside = $lastLog && $lastLog->action === 'entry';
        }

        return view('income.show', compact('income', 'attendanceHistory', 'userType', 'userId', 'isInside'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param Income $income El ingreso financiero que se va a editar.
     * @return View Una vista con el formulario de edición.
     */
    public function edit(Income $income): View
    {
        // Devuelve la vista 'income.edit' con el formulario de edición y el ingreso financiero a editar
        return view('income.edit', compact('income'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param IncomeRequest $request La solicitud HTTP con los datos actualizados del ingreso financiero.
     * @param Income $income El ingreso financiero que se va a actualizar.
     * @return RedirectResponse Una redirección a la lista de ingresos financieros con un mensaje de éxito.
     */
    public function update(IncomeRequest $request, Income $income): RedirectResponse
    {
        // Actualiza los datos del ingreso financiero en la base de datos
        $income->update($request->validated());

        // Redirige al usuario a la lista de ingresos financieros con un mensaje de éxito
        return Redirect::route('income.index')
            ->with('success', 'Income updated successfully');
    }

    /**
     * Elimina el recurso especificado en el almacenamiento.
     *
     * @param Income $income El ingreso financiero que se va a eliminar.
     * @return RedirectResponse Una redirección a la lista de ingresos financieros con un mensaje de éxito.
     */
    public function destroy(Income $income): RedirectResponse
    {
        // Elimina el ingreso financiero de la base de datos
        $income->delete();

        // Redirige al usuario a la lista de ingresos financieros con un mensaje de éxito
        return Redirect::route('income.index')
            ->with('success', 'Income deleted successfully');
    }
}
