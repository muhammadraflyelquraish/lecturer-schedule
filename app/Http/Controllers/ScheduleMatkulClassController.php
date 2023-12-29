<?php

namespace App\Http\Controllers;

use App\Models\ScheduleMatkulClass;
use Illuminate\Http\Request;

class ScheduleMatkulClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('course.index', [
            'ScheduleMatkulClasses' => ScheduleMatkulClass::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ScheduleMatkulClass $scheduleMatkulClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScheduleMatkulClass $scheduleMatkulClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScheduleMatkulClass $scheduleMatkulClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScheduleMatkulClass $scheduleMatkulClass)
    {
        //
    }
}
