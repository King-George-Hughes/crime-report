<?php

namespace App\Http\Controllers;

use App\Models\EmergencyType;
use Illuminate\Http\Request;

class EmergencyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emergencyTypes = EmergencyType::all();
        return view('emergency.create', compact('emergencyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fromFields = $request->validate(
            [
                'name' => 'required',
                'description' => 'required | min:3'
            ]
        );

        EmergencyType::create($fromFields);

        return back()->with('message', 'Emergency Type Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmergencyType  $emergencyType
     * @return \Illuminate\Http\Response
     */
    public function show(EmergencyType $emergencyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmergencyType  $emergencyType
     * @return \Illuminate\Http\Response
     */
    public function edit(EmergencyType $emergencyType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmergencyType  $emergencyType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmergencyType $emergencyType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmergencyType  $emergencyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmergencyType $emergencyType)
    {
        //
    }
}