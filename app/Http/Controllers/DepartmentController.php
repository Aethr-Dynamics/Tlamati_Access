<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * Controlador para gestionar los departamentos del sistema.
 */
class DepartmentController extends Controller
{
    /**
     * Muestra una lista de departamentos.
     *
     * @param Request $request La solicitud HTTP.
     * @return View Una vista con la lista de departamentos.
     */
    public function index(Request $request): View
    {
        // Obtiene los departamentos ordenados por nombre y paginados
        $departments = Department::orderBy('nombre', 'asc')->paginate();

        // Devuelve la vista 'department.index' con la lista de departamentos y el número de página actual
        return view('department.index', compact('departments'))
            ->with('i', ($request->input('page', 1) - 1) * $departments->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo departamento.
     *
     * @return View Una vista con el formulario de creación.
     */
    public function create(): View
    {
        // Crea una instancia vacía del modelo Department
        $department = new Department();

        // Devuelve la vista 'department.create' con el formulario de creación
        return view('department.create', compact('department'));
    }

    /**
     * Almacena un nuevo departamento en la base de datos.
     *
     * @param DepartmentRequest $request La solicitud HTTP con los datos del departamento.
     * @return RedirectResponse Una redirección a la lista de departamentos con un mensaje de éxito.
     */
    public function store(DepartmentRequest $request): RedirectResponse
    {
        // Crea y guarda el nuevo departamento en la base de datos
        Department::create($request->validated());

        // Redirige al usuario a la lista de departamentos con un mensaje de éxito
        return Redirect::route('department.index')
            ->with('success', 'Department created successfully.');
    }

    /**
     * Muestra los detalles de un departamento específico.
     *
     * @param Department $department El departamento que se va a mostrar.
     * @return View Una vista con los detalles del departamento.
     */
    public function show(Department $department): View
    {
        // Devuelve la vista 'department.show' con los detalles del departamento
        return view('department.show', compact('department'));
    }

    /**
     * Muestra el formulario para editar un departamento específico.
     *
     * @param Department $department El departamento que se va a editar.
     * @return View Una vista con el formulario de edición.
     */
    public function edit(Department $department): View
    {
        // Devuelve la vista 'department.edit' con el formulario de edición y el departamento a editar
        return view('department.edit', compact('department'));
    }

    /**
     * Actualiza los detalles de un departamento específico en la base de datos.
     *
     * @param DepartmentRequest $request La solicitud HTTP con los datos actualizados del departamento.
     * @param Department $department El departamento que se va a actualizar.
     * @return RedirectResponse Una redirección a la lista de departamentos con un mensaje de éxito.
     */
    public function update(DepartmentRequest $request, Department $department): RedirectResponse
    {
        // Actualiza los datos del departamento en la base de datos
        $department->update($request->validated());

        // Redirige al usuario a la lista de departamentos con un mensaje de éxito
        return Redirect::route('department.index')
            ->with('success', 'Department updated successfully');
    }

    /**
     * Elimina un departamento específico de la base de datos.
     *
     * @param Department $department El departamento que se va a eliminar.
     * @return RedirectResponse Una redirección a la lista de departamentos con un mensaje de éxito.
     */
    public function destroy(Department $department): RedirectResponse
    {
        // Elimina el departamento de la base de datos
        $department->delete();

        // Redirige al usuario a la lista de departamentos con un mensaje de éxito
        return Redirect::route('department.index')
            ->with('success', 'Department deleted successfully');
    }
}