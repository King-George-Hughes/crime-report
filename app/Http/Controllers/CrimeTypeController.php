<?php

namespace App\Http\Controllers;

use App\Models\CrimeType;
use Illuminate\Http\Request;

class CrimeTypeController extends Controller
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
        $crimeTypes = CrimeType::all();
        return view('crimes.create', compact('crimeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $formFields = $request->validate(
            [
                'name' => 'required',
                'description' => 'required | min:3'
            ]
        );

        // dd($formFields);

        CrimeType::create($formFields);

        return back()->with('message', 'Crime Type Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrimeType  $crimeType
     * @return \Illuminate\Http\Response
     */
    public function show(CrimeType $crimeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrimeType  $crimeType
     * @return \Illuminate\Http\Response
     */
    public function edit(CrimeType $crimeType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrimeType  $crimeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CrimeType $crimeType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrimeType  $crimeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CrimeType $crimeType)
    {
        //
    }
}