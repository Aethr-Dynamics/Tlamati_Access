<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\WorkerRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $workers = Worker::paginate();

        return view('worker.index', compact('workers'))
            ->with('i', ($request->input('page', 1) - 1) * $workers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $worker = new Worker();

        return view('worker.create', compact('worker'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkerRequest $request): RedirectResponse
    {
        Worker::create($request->validated());

        return Redirect::route('workers.index')
            ->with('success', 'Worker created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $worker = Worker::find($id);

        return view('worker.show', compact('worker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $worker = Worker::find($id);

        return view('worker.edit', compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkerRequest $request, Worker $worker): RedirectResponse
    {
        $worker->update($request->validated());

        return Redirect::route('workers.index')
            ->with('success', 'Worker updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Worker::find($id)->delete();

        return Redirect::route('workers.index')
            ->with('success', 'Worker deleted successfully');
    }
}
