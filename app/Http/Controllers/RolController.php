<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RolRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Department;

/**
 * Controlador para gestionar roles.
 *
 * Este controlador proporciona métodos para crear, mostrar, editar y eliminar
 * registros de roles. Incluye protección contra inyecciones SQL mediante el uso
 * de consultas preparadas.
 */
class RolController extends Controller
{
    /**
     * Muestra una lista del recurso.
     *
     * @param Request $request La solicitud HTTP.
     * @return View Una vista con la lista de roles.
     */
    public function index(Request $request): View
    {
        $rols = Rol::orderBy('rol', 'asc')->paginate();

        return view('rol.index', compact('rols'))
            ->with('i', ($request->input('page', 1) - 1) * $rols->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return View Una vista con el formulario de creación y los departamentos disponibles.
     */
    public function create(): View
    {
        $rol = new Rol();
        $departments = Department::pluck('nombre', 'id');

        return view('rol.create', compact('rol', 'departments'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     *
     * @param RolRequest $request La solicitud HTTP con los datos del rol.
     * @return RedirectResponse Una redirección a la lista de roles con un mensaje de éxito.
     */
    public function store(RolRequest $request): RedirectResponse
    {
        Rol::create($request->validated());

        return Redirect::route('rol.index')
            ->with('success', 'Rol created successfully.');
    }

    /**
     * Muestra los detalles de un recurso especificado.
     *
     * @param Rol $rol El rol que se va a mostrar.
     * @return View Una vista con los detalles del rol.
     */
    public function show(Rol $rol): View
    {
        return view('rol.show', compact('rol'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param Rol $rol El rol que se va a editar.
     * @return View Una vista con el formulario de edición y los departamentos disponibles.
     */
    public function edit(Rol $rol): View
    {
        $departments = Department::pluck('nombre', 'id');

        return view('rol.edit', compact('rol', 'departments'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param RolRequest $request La solicitud HTTP con los datos actualizados del rol.
     * @param Rol $rol El rol que se va a actualizar.
     * @return RedirectResponse Una redirección a la lista de roles con un mensaje de éxito.
     */
    public function update(RolRequest $request, Rol $rol): RedirectResponse
    {
        $rol->update($request->validated());

        return Redirect::route('rol.index')
            ->with('success', 'Rol updated successfully');
    }

    /**
     * Elimina el recurso especificado en el almacenamiento.
     *
     * @param Rol $rol El rol que se va a eliminar.
     * @return RedirectResponse Una redirección a la lista de roles con un mensaje de éxito.
     */
    public function destroy(Rol $rol): RedirectResponse
    {
        $rol->delete();

        return Redirect::route('rol.index')
            ->with('success', 'Rol deleted successfully');
    }
}