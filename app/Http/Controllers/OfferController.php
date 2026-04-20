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
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $offers = Offer::paginate();

        return view('offer.index', compact('offers'))
            ->with('i', ($request->input('page', 1) - 1) * $offers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $offer = new Offer();

        return view('offer.create', compact('offer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferRequest $request): RedirectResponse
    {
        Offer::create($request->validated());

        return Redirect::route('offers.index')
            ->with('success', 'Offer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $offer = Offer::find($id);

        return view('offer.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $offer = Offer::find($id);

        return view('offer.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferRequest $request, Offer $offer): RedirectResponse
    {
        $offer->update($request->validated());

        return Redirect::route('offers.index')
            ->with('success', 'Offer updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Offer::find($id)->delete();

        return Redirect::route('offers.index')
            ->with('success', 'Offer deleted successfully');
    }
}
