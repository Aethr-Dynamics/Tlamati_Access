<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Models\School;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * Controlador para gestionar escuelas.
 *
 * Este controlador proporciona métodos para crear, mostrar, editar y eliminar
 * registros de escuelas. Incluye protección contra inyecciones SQL mediante el uso
 * de consultas preparadas.
 */
class SchoolController extends Controller
{
    /**
     * Muestra una lista del recurso.
     *
     * @param Request $request La solicitud HTTP.
     * @return View Una vista con la lista de escuelas.
     */
    public function index(Request $request): View
    {
        $schools = School::orderBy('plantel', 'asc')->paginate();

        return view('school.index', compact('schools'))
            ->with('i', ($request->input('page', 1) - 1) * $schools->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return View Una vista con el formulario de creación.
     */
    public function create(): View
    {
        $school = new School();

        return view('school.create', compact('school'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     *
     * @param SchoolRequest $request La solicitud HTTP con los datos de la escuela.
     * @return RedirectResponse Una redirección a la lista de escuelas con un mensaje de éxito.
     */
    public function store(SchoolRequest $request): RedirectResponse
    {
        School::create($request->validated());

        return Redirect::route('school.index')
            ->with('success', 'School created successfully.');
    }

    /**
     * Muestra los detalles de un recurso especificado.
     *
     * @param School $school La escuela que se va a mostrar.
     * @return View Una vista con los detalles de la escuela.
     */
    public function show(School $school): View
    {
        return view('school.show', compact('school'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param School $school La escuela que se va a editar.
     * @return View Una vista con el formulario de edición.
     */
    public function edit(School $school): View
    {
        return view('school.edit', compact('school'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param SchoolRequest $request La solicitud HTTP con los datos actualizados de la escuela.
     * @param School $school La escuela que se va a actualizar.
     * @return RedirectResponse Una redirección a la lista de escuelas con un mensaje de éxito.
     */
    public function update(SchoolRequest $request, School $school): RedirectResponse
    {
        $school->update($request->validated());

        return Redirect::route('school.index')->with('success', 'School updated successfully');
    }

    /**
     * Elimina el recurso especificado en el almacenamiento.
     *
     * @param School $school La escuela que se va a eliminar.
     * @return RedirectResponse Una redirección a la lista de escuelas con un mensaje de éxito.
     */
    public function destroy(School $school): RedirectResponse
    {
        $school->delete();

        return Redirect::route('school.index')
            ->with('success', 'School deleted successfully');
    }
}