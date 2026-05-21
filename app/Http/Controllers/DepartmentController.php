<?php
namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index(Request $request): View
    {
        $departments = Department::orderBy('nombre', 'asc')->paginate();

        return view('department.index', compact('departments'))
            ->with('i', ($request->input('page', 1) - 1) * $departments->perPage());
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $department = new Department();

        return view('department.create', compact('department'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     */
    public function store(DepartmentRequest $request): RedirectResponse
    {
        Department::create($request->validated());

        return Redirect::route('department.index')
            ->with('success', 'Department created successfully.');
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(Department $department): View
    {
        return view('department.show', compact('department'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     */
    public function edit(Department $department): View
    {
        return view('department.edit', compact('department'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(DepartmentRequest $request, Department $department): RedirectResponse
    {
        $department->update($request->validated());

        return Redirect::route('department.index')
            ->with('success', 'Department updated successfully');
    }

    /**
     * Elimina el recurso especificado en el almacenamiento.
     */
    public function destroy(Department $department): RedirectResponse
    {
        $department->delete();

        return Redirect::route('department.index')
            ->with('success', 'Department deleted successfully');
    }
}
