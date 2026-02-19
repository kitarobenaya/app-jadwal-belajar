<?php

namespace App\Http\Controllers;

use App\Models\StudyList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StudyListController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create($studyDayId)
    {
        $studyDay = Auth::user()->studyDays()->where('study_days_id', $studyDayId)->first();

        // check if study day exist or not
        // also check if the study day belong to the user
        if(!$studyDay) {
            return abort(403);
        }

        return view('dashboard.study-list.form', compact('studyDay'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // check if study day exist or not
        // also check if the study day belong to the user

        $studyDay = Auth::user()->studyDays()->where('study_days_id', $request->study_days_id)->first();

        if(!$studyDay) {
            return abort(403);
        }

        try {
            $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'study_days_id' => ['required', 'exists:study_days,study_days_id'],
                'description' => ['string'],
                'start_time' => ['required', 'date_format:H:i'],
                'end_time' => ['required', 'date_format:H:i'],
            ]);


            Auth::user()->studyLists()->create([
                'title' => $request->title,
                'study_days_id' => $request->study_days_id,
                'description' => $request->description ?? "No description.",
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'status' => false
            ]);

            return redirect("/study-list/$request->study_days_id")
                ->with('success', 'Study List created successfully.');
        }
        catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($studyDayId)
    {
        // get one study day
        $studyDay = Auth::user()->studyDays()->where('study_days_id', $studyDayId)->first();

        // check if study day exist or not
        // also check if the study day belong to the user
        if(!$studyDay) {
            return abort(403);
        }

        // get all study list
        $study_lists = Auth::user()->studyLists()->where('study_days_id', $studyDayId)->get();

        view('layout.layout', compact('study_lists'));

        return view('dashboard.study-list.index', compact('studyDay', 'study_lists'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($studyDayId)
    {
        $studyDay = Auth::user()->studyDays()->where('study_days_id', $studyDayId)->first() ?? [];

        // check if study day exist or not
        // also check if the study day belong to the user
        if(!$studyDay) {
            return abort(403);
        }

        $studyList = Auth::user()->studyLists()->where('study_days_id', $studyDayId)->first() ?? [];

        return view('dashboard.study-list.form_edit', compact('studyDay', 'studyList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $studyDayId)
    {
        // check if study day exist or not
        // also check if the study day belong to the user
        $studyDay = Auth::user()->studyDays()->where('study_days_id', $request->study_days_id)->first();

        if(!$studyDay) {
            return abort(403);
        }

        try {
            $studyList = Auth::user()->studyLists()->where('study_days_id', $studyDayId)->first();

            $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'study_days_id' => ['required', 'exists:study_days,study_days_id'],
                'description' => ['string'],
                'start_time' => ['required', 'date_format:H:i'],
                'end_time' => ['required', 'date_format:H:i'],
            ]);


            $studyList->update([
                'title' => $request->title,
                'study_days_id' => $request->study_days_id,
                'description' => $request->description ?? "No description.",
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);

            return redirect("/study-list/$studyList->study_days_id")
                ->with('success', 'Study List updated successfully.');
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
    public function destroy($studyDayId)
    {
        // check if study day exist or not
        // also check if the study day belong to the user
        $studyDay = Auth::user()->studyDays()->where('study_days_id', $studyDayId)->first();

        if(!$studyDay) {
            return abort(403);
        }

        try {
            $studyList = Auth::user()->studyLists()->where('study_days_id', $studyDayId)->first();

            $studyList->delete();
        
            return redirect("/study-list/$studyDayId")
                ->with('success', 'Study List deleted successfully.');
        }
        catch (\Throwable $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }
}
