<?php

namespace App\Http\Controllers;

use App\Models\StudyDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StudyDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_schedules = Auth::user()->studyDays ?? [];

        view('layout.layout', compact('all_schedules'));
        
        return view('dashboard.study-day.index', compact('all_schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.study-day.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       try {
            $request->validate([
                'date' => ['required', 'date'],
            ]);

            Auth::user()->studyDays()->create([
                'date' => $request->date
            ]);

            return redirect("/study-day")
                ->with('success', 'Schedule created successfully.');
       }
       catch (\Throwable $th) {
           return redirect()
                ->back()
                ->with('error', $th->getMessage());
       }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudyDay $studyDay)
    {
        Gate::authorize('update', $studyDay);

        return view('dashboard.study-day.form_edit', compact('studyDay'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudyDay $studyDay)
    {
        Gate::authorize('update', $studyDay);
        
        try {
            $request->validate([
                'date' => ['required', 'date'],
            ]);

            $studyDay->update([
                'date' => $request->date
            ]);

            return redirect("/study-day")
                ->with('success', 'Schedule updated successfully.');
        }
        catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyDay $studyDay)
    {
        Gate::authorize('delete', $studyDay);

        try{
            $studyDay->delete();
        
            return redirect("/study-day")
                ->with('success', 'Schedule deleted successfully.');
        }
        catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }
}
