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
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $visitors = Visitor::paginate();

        return view('visitor.index', compact('visitors'))
            ->with('i', ($request->input('page', 1) - 1) * $visitors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $visitor = new Visitor();

        return view('visitor.create', compact('visitor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisitorRequest $request): RedirectResponse
    {
        Visitor::create($request->validated());

        return Redirect::route('visitors.index')
            ->with('success', 'Visitor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $visitor = Visitor::find($id);

        return view('visitor.show', compact('visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $visitor = Visitor::find($id);

        return view('visitor.edit', compact('visitor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisitorRequest $request, Visitor $visitor): RedirectResponse
    {
        $visitor->update($request->validated());

        return Redirect::route('visitors.index')
            ->with('success', 'Visitor updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Visitor::find($id)->delete();

        return Redirect::route('visitors.index')
            ->with('success', 'Visitor deleted successfully');
    }
}
