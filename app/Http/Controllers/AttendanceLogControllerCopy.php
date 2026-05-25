<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AttendanceLogRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AttendanceLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $attendanceLogs = AttendanceLog::paginate();

        return view('attendance-log.index', compact('attendanceLogs'))
            ->with('i', ($request->input('page', 1) - 1) * $attendanceLogs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $attendanceLog = new AttendanceLog();

        return view('attendance-log.create', compact('attendanceLog'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttendanceLogRequest $request): RedirectResponse
    {
        AttendanceLog::create($request->validated());

        return Redirect::route('attendance-log.index')
            ->with('success', 'AttendanceLog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $attendanceLog = AttendanceLog::find($id);

        return view('attendance-log.show', compact('attendanceLog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $attendanceLog = AttendanceLog::find($id);

        return view('attendance-log.edit', compact('attendanceLog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttendanceLogRequest $request, AttendanceLog $attendanceLog): RedirectResponse
    {
        $attendanceLog->update($request->validated());

        return Redirect::route('attendance-logs.index')
            ->with('success', 'AttendanceLog updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        AttendanceLog::find($id)->delete();

        return Redirect::route('attendance-log.index')
            ->with('success', 'AttendanceLog deleted successfully');
    }
}
