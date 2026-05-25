<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

/**
 * Controlador para gestionar ofertas.
 *
 * Este controlador proporciona métodos para crear, mostrar, editar y eliminar
 * registros de ofertas. Incluye protección contra inyecciones SQL mediante el uso
 * de consultas preparadas.
 */
class OfferController extends Controller
{
    /**
     * Muestra una lista del recurso.
     *
     * @param Request $request La solicitud HTTP.
     * @return View Una vista con la lista de ofertas.
     */
    public function index(Request $request): View
    {
        $offers = Offer::orderBy('nombre', 'asc')->paginate();

        return view('offer.index', compact('offers'))
            ->with('i', ($request->input('page', 1) - 1) * $offers->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return View Una vista con el formulario de creación.
     */
    public function create(): View
    {
        $offer = new Offer();

        return view('offer.create', compact('offer'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     *
     * @param OfferRequest $request La solicitud HTTP con los datos de la oferta.
     * @return RedirectResponse Una redirección a la lista de ofertas con un mensaje de éxito.
     */
    public function store(OfferRequest $request): RedirectResponse
    {
        Offer::create($request->validated());

        return Redirect::route('offer.index')
            ->with('success', 'Offer created successfully.');
    }

    /**
     * Muestra los detalles de un recurso especificado.
     *
     * @param Offer $offer La oferta que se va a mostrar.
     * @return View Una vista con los detalles de la oferta.
     */
    public function show(Offer $offer): View
    {
        return view('offer.show', compact('offer'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param Offer $offer La oferta que se va a editar.
     * @return View Una vista con el formulario de edición.
     */
    public function edit(Offer $offer): View
    {
        return view('offer.edit', compact('offer'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param OfferRequest $request La solicitud HTTP con los datos actualizados de la oferta.
     * @param Offer $offer La oferta que se va a actualizar.
     * @return RedirectResponse Una redirección a la lista de ofertas con un mensaje de éxito.
     */
    public function update(OfferRequest $request, Offer $offer): RedirectResponse
    {
        $offer->update($request->validated());

        return Redirect::route('offer.index')
            ->with('success', 'Offer updated successfully');
    }

    /**
     * Elimina el recurso especificado en el almacenamiento.
     *
     * @param Offer $offer La oferta que se va a eliminar.
     * @return RedirectResponse Una redirección a la lista de ofertas con un mensaje de éxito.
     */
    public function destroy(Offer $offer): RedirectResponse
    {
        $offer->delete();

        return Redirect::route('offer.index')
            ->with('success', 'Offer deleted successfully');
    }
}