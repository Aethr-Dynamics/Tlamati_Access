<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\WorkerRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\School;
use App\Models\Rol;
use App\Models\Offer;

class WorkerController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index(Request $request): View
    {
        $workers = Worker::orderBy('nombre', 'asc')->paginate();

        return view('worker.index', compact('workers'))
            ->with('i', ($request->input('page', 1) - 1) * $workers->perPage());
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $worker = new Worker();
        
        $schools = School::pluck('plantel', 'id');
        $rols = Rol::pluck('rol', 'id');
        $offers = Offer::pluck('nombre', 'id');

        return view('worker.create', compact('worker', 'schools', 'rols', 'offers'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     */
    public function store(WorkerRequest $request): RedirectResponse
    {
        Worker::create($request->validated());

        return Redirect::route('worker.index')
            ->with('success', 'Worker created successfully.');
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(Worker $worker): View
    {
        return view('worker.show', compact('worker'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     */
    public function edit(Worker $worker): View
    {
        $schools = School::pluck('plantel', 'id');
        $rols = Rol::pluck('rol', 'id');
        $offers = Offer::pluck('nombre', 'id');

        return view('worker.edit', compact('worker', 'schools', 'rols', 'offers'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(WorkerRequest $request, Worker $worker): RedirectResponse
    {
        $worker->update($request->validated());
        
        return Redirect::route('worker.index')
            ->with('success', 'Worker updated successfully');
    }

    /**
     * Elimina el recurso especificado en el almacenamiento.
     */    
    public function destroy(Worker $worker): RedirectResponse
    {
        $worker->delete();

        return Redirect::route('worker.index')
            ->with('success', 'Worker deleted successfully');
    }
}
