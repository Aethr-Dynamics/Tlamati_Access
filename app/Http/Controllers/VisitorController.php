<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VisitorRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VisitorController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index(Request $request): View
    {
        $visitors = Visitor::orderBy('nombre', 'asc')->paginate();

        return view('visitor.index', compact('visitors'))
            ->with('i', ($request->input('page', 1) - 1) * $visitors->perPage());
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $visitor = new Visitor();

        return view('visitor.create', compact('visitor'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     */
    public function store(VisitorRequest $request): RedirectResponse
    {
        Visitor::create($request->validated());

        return Redirect::route('visitor.index')
            ->with('success', 'Visitor created successfully.');
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(Visitor $visitor): View
    {

        return view('visitor.show', compact('visitor'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     */
    public function edit(Visitor $visitor): View
    {

        return view('visitor.edit', compact('visitor'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(VisitorRequest $request, Visitor $visitor): RedirectResponse
    {
        $visitor->update($request->validated());

        return Redirect::route('visitor.index')
            ->with('success', 'Visitor updated successfully');
    }

    /**
     * Elimina el recurso especificado en el almacenamiento.
     */      
    public function destroy(Visitor $visitor): RedirectResponse
    {
        $visitor->delete();

        return Redirect::route('visitor.index')
            ->with('success', 'Visitor deleted successfully');
    }
}
