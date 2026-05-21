<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\IncomeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Student;
use App\Models\Visitor;
use App\Models\Worker;
use Carbon\Carbon;

class IncomeController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index(Request $request): View
    {
        // TODO se calcule en zona horaria de México (America/Mexico_City) aunque el servidor esté en UTC.
        $tz    = 'America/Mexico_City';
        
        $start = Carbon::now($tz)->startOfDay();
        $end   = Carbon::now($tz)->endOfDay();

        $incomes = Income::whereBetween('created_at', [$start, $end])->paginate();

        return view('income.index', compact('incomes'))
            ->with('i', ($request->input('page', 1) - 1) * $incomes->perPage());
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $income = new Income();

        return view('income.create', compact('income'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     */
    // public function store(IncomeRequest $request): RedirectResponse
    // {
    //     Income::create($request->validated());

    //     return Redirect::route('income.index')
    //         ->with('success', 'Income created successfully.');
    // }

    public function store(IncomeRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Contar cuántos IDs vienen con valor
        $filled = collect([
            'id_worker' => $data['id_worker'] ?? null,
            'id_student' => $data['id_student'] ?? null,
            'id_visitor' => $data['id_visitor'] ?? null,
        ])->filter(fn($v) => !is_null($v) && $v !== '');

        // Validación: solo uno permitido
        if ($filled->count() > 1) {
            return back()
                ->withErrors(['error' => 'Solo puedes registrar un tipo: worker, student o visitor'])
                ->withInput();
        }

        // Validación: al menos uno requerido
        if ($filled->count() === 0) {
            return back()
                ->withErrors(['error' => 'Debes ingresar al menos un ID'])
                ->withInput();
        }

        // Inicializar todos en null
        $data['con_worker'] = null;
        $data['con_student'] = null;
        $data['con_visitor'] = null;

        // Asignar automáticamente el con_
        if (!empty($data['id_worker'])) {
            $data['con_worker'] = 1;
            $data['id_student'] = null;
            $data['id_visitor'] = null;
        }

        if (!empty($data['id_student'])) {
            $data['con_student'] = 1;
            $data['id_worker'] = null;
            $data['id_visitor'] = null;
        }

        if (!empty($data['id_visitor'])) {
            $data['con_visitor'] = 1;
            $data['id_worker'] = null;
            $data['id_student'] = null;
        }

        Income::create($data);

        return Redirect::route('income.index')
            ->with('success', 'Income creado correctamente.');
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(Income $income): View
    {

        return view('income.show', compact('income'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     */
    public function edit(Income $income): View
    {

        return view('income.edit', compact('income'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(IncomeRequest $request, Income $income): RedirectResponse
    {
        $income->update($request->validated());

        return Redirect::route('income.index')
            ->with('success', 'Income updated successfully');
    }

    /**
     * Elimina el recurso especificado en el almacenamiento.
     */    
    public function destroy(Income $income): RedirectResponse
    {
        $income->delete();

        return Redirect::route('income.index')
            ->with('success', 'Income deleted successfully');
    }
}
