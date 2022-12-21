<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use Illuminate\Http\Request;

class EmergencyController extends Controller
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
        // return view('emergency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'name' => 'required',
            'ip' => 'required',
            'region' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'description' => 'required | min:3',
        ]);

        // dd($formFields);
        
        // Hashed Password        
        Emergency::create($formFields);
        
        return redirect('/')->with('message', 'Emergency Submitted Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emergency  $emergency
     * @return \Illuminate\Http\Response
     */
    public function show(Emergency $emergency)
    {
        return view('emergency.review', [
            'emergency' => $emergency
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emergency  $emergency
     * @return \Illuminate\Http\Response
     */
    public function edit(Emergency $emergency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emergency  $emergency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emergency $emergency)
    {
        $formFields = $request->validate(
            [
                'status' => 'required',
            ]
        );
        // dd($formFields);
        $emergency->update($formFields);

        return back()->with('message', 'Emergency Activated Successfully');
    }

    public function close(Request $request, Emergency $emergency)
    {
        $formFields = $request->validate(
            [
                'status' => 'required',
            ]
        );
        // dd($formFields);
        $emergency->update($formFields);

        return back()->with('message', 'Emergency Closed Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emergency  $emergency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emergency $emergency)
    {
        $emergency->delete();

        return back()->with('message', 'Emergency Deleted Successfully!');
    }
}