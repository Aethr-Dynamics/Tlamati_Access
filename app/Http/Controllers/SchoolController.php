<?php
namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Models\School;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SchoolController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index(Request $request): View
    {

        $schools = School::orderBy('plantel', 'asc')->paginate();

        return view('school.index', compact('schools'))
            ->with('i', ($request->input('page', 1) - 1) * $schools->perPage());
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $school = new School();

        return view('school.create', compact('school'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     */
    public function store(SchoolRequest $request): RedirectResponse
    {
        School::create($request->validated());

        return Redirect::route('school.index')
            ->with('success', 'School created successfully.');
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(School $school): View
    {

        return view('school.show', compact('school'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     */
    public function edit(School $school): View
    {
        return view('school.edit', compact('school'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(SchoolRequest $request, School $school): RedirectResponse
    {
        $school->update($request->validated());
        return Redirect::route('school.index')->with('success', 'School updated successfully');
    }

    /**
     * Elimina el recurso especificado en el almacenamiento.
     */
    public function destroy(School $school): RedirectResponse
    {
        $school->delete();

        return Redirect::route('school.index')
            ->with('success', 'School deleted successfully');
    }
}
