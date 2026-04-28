<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OfferController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index(Request $request): View
    {
        $offers = Offer::orderBy('nombre', 'asc')->paginate();

        return view('offer.index', compact('offers'))
            ->with('i', ($request->input('page', 1) - 1) * $offers->perPage());
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     */
    public function create(): View
    {
        $offer = new Offer();

        return view('offer.create', compact('offer'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     */
    public function store(OfferRequest $request): RedirectResponse
    {
        Offer::create($request->validated());

        return Redirect::route('offer.index')
            ->with('success', 'Offer created successfully.');
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(Offer $offer): View
    {
        return view('offer.show', compact('offer'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     */
    public function edit(Offer $offer): View
    {
        return view('offer.edit', compact('offer'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(OfferRequest $request, Offer $offer): RedirectResponse
    {
        $offer->update($request->validated());

        return Redirect::route('offer.index')
            ->with('success', 'Offer updated successfully');
    }

    /**
     * Elimina el recurso especificado en el almacenamiento.
     */     
    public function destroy(Offer $offer): RedirectResponse
    {
        $offer->delete();

        return Redirect::route('offer.index')
            ->with('success', 'Offer deleted successfully');
    }
}
