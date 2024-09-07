<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Timesheet::query();

        if ($request->has('task_name')) {
            $query->where('task_name', $request->task_name);
        }

        if ($request->has('date')) {
            $query->where('date', $request->date);
        }

        if ($request->has('hours')) {
            $query->where('hours', $request->hours);
        }

        return $query->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'date' => 'required|date',
            'hours' => 'required|integer',
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id'
        ]);

        $timesheet = Timesheet::create($request->all());

        return response()->json($timesheet);    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $timesheet = Timesheet::findOrFail($id);
        return response()->json($timesheet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $timesheet = Timesheet::findOrFail($request->id);
        $timesheet->update($request->all());
        return response()->json($timesheet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $timesheet = Timesheet::findOrFail($request->id);
        $timesheet->delete();
        return response()->json(['message' => 'Timesheet deleted']);
    }
}
