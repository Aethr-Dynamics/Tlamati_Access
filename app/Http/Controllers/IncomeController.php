<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\IncomeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $incomes = Income::paginate();

        return view('income.index', compact('incomes'))
            ->with('i', ($request->input('page', 1) - 1) * $incomes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $income = new Income();

        return view('income.create', compact('income'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncomeRequest $request): RedirectResponse
    {
        Income::create($request->validated());

        return Redirect::route('incomes.index')
            ->with('success', 'Income created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $income = Income::find($id);

        return view('income.show', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $income = Income::find($id);

        return view('income.edit', compact('income'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IncomeRequest $request, Income $income): RedirectResponse
    {
        $income->update($request->validated());

        return Redirect::route('incomes.index')
            ->with('success', 'Income updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Income::find($id)->delete();

        return Redirect::route('incomes.index')
            ->with('success', 'Income deleted successfully');
    }
}
