<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\TurtleType;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treatments = Treatment::orderBy('views', 'desc')->with('turtleType')->get();

        return view('treatments.index', ['treatments' => $treatments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turtleTypes = TurtleType::all();
        return view('treatments.create', ['turtle_types' => $turtleTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $treatment = Treatment::create([
            'turtle_type_id' => $request->input('turtle-type'), 
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);

        if ($treatment == null) {
            // TODO
            return;
        }

        return redirect()->route('treatments.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function edit(Treatment $treatment)
    {
        $turtleTypes = TurtleType::all();

        return view('treatments.edit', [
            'treatment' => $treatment,
            'turtle_types' => $turtleTypes
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treatment $treatment)
    {
        $treatment->update([
            'turtle_type_id' => $request->input('turtle-type'),
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);

        return redirect()->route('treatments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatment $treatment)
    {
        $treatment->delete();

        return redirect()->route('treatments.index');
    }
}
