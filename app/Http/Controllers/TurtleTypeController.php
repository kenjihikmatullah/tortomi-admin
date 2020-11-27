<?php

namespace App\Http\Controllers;

use App\Models\TurtleType;
use Illuminate\Http\Request;

class TurtleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turtleTypes = TurtleType::all();
        return view('turtle_types.index', ['turtle_types' => $turtleTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('turtle_types.create');
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
            'name' => 'required',
            'description' => 'required'
        ]);

        $turtleType = TurtleType::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if ($turtleType == null) {
            // TODO
            return;
        }

        return redirect()->route('turtle-types.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TurtleType  $turtleType
     * @return \Illuminate\Http\Response
     */
    public function edit(TurtleType $turtleType)
    {
        return view('turtle_types.edit', ['turtle_type' => $turtleType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TurtleType  $turtleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        TurtleType::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description')
            ]);

        return redirect()->route('turtle-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TurtleType  $turtleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TurtleType $turtleType)
    {
        $turtleType->delete();

        return redirect()->route('turtle-types.index');
    }
}
