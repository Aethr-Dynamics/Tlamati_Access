<?php

namespace App\Http\Controllers;

use App\Models\Codeqr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CodeqrRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CodeqrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $codeqrs = Codeqr::paginate();

        return view('codeqr.index', compact('codeqrs'))
            ->with('i', ($request->input('page', 1) - 1) * $codeqrs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $codeqr = new Codeqr();

        return view('codeqr.create', compact('codeqr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CodeqrRequest $request): RedirectResponse
    {
        Codeqr::create($request->validated());

        return Redirect::route('codeqr.index')
            ->with('success', 'Codeqr created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $codeqr = Codeqr::find($id);

        return view('codeqr.show', compact('codeqr'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $codeqr = Codeqr::find($id);

        return view('codeqr.edit', compact('codeqr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CodeqrRequest $request, Codeqr $codeqr): RedirectResponse
    {
        $codeqr->update($request->validated());

        return Redirect::route('codeqrs.index')
            ->with('success', 'Codeqr updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Codeqr::find($id)->delete();

        return Redirect::route('codeqr.index')
            ->with('success', 'Codeqr deleted successfully');
    }
}
