<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RolRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Department;

class RolController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index(Request $request): View
    {
        $rols = Rol::orderBy('rol', 'asc')->paginate();

        return view('rol.index', compact('rols'))
            ->with('i', ($request->input('page', 1) - 1) * $rols->perPage());
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $rol = new Rol();
        $departments = Department::pluck('nombre', 'id');

        // return view('rol.create', compact('rol'));
        return view('rol.create', compact('rol', 'departments'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     */
    public function store(RolRequest $request): RedirectResponse
    {
        Rol::create($request->validated());

        return Redirect::route('rol.index')
            ->with('success', 'Rol created successfully.');
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(Rol $rol): View
    {
        return view('rol.show', compact('rol'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     */
    public function edit(Rol $rol): View
    {
        $departments = Department::pluck('nombre', 'id');

        // return view('rol.edit', compact('rol'));
        return view('rol.edit', compact('rol', 'departments'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(RolRequest $request, Rol $rol): RedirectResponse
    {
        $rol->update($request->validated());

        return Redirect::route('rol.index')
            ->with('success', 'Rol updated successfully');
    }

    /**
     * Elimina el recurso especificado en el almacenamiento.
     */    
    public function destroy(Rol $rol): RedirectResponse
    {
        $rol->delete();

        return Redirect::route('rol.index')
            ->with('success', 'Rol deleted successfully');
    }
}
