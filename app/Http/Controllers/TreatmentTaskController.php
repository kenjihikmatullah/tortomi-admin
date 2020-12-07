<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\TreatmentTask;
use Illuminate\Http\Request;

class TreatmentTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($treatmentId)
    {
        $tasks = TreatmentTask::where('treatment_id', $treatmentId)->get();
        $treatment = Treatment::find($treatmentId);
        $treatments = Treatment::all();

        return view('treatments.tasks.index', [
            'tasks' => $tasks,
            'treatment' => $treatment,
            'treatments' => $treatments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TreatmentTask  $treatmentTask
     * @return \Illuminate\Http\Response
     */
    public function edit(TreatmentTask $treatmentTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TreatmentTask  $treatmentTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TreatmentTask $treatmentTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TreatmentTask  $treatmentTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(TreatmentTask $treatmentTask)
    {
        //
    }
}
