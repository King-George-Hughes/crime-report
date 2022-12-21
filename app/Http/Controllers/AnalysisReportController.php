<?php

namespace App\Http\Controllers;

use App\Models\AnalysisReport;
use Illuminate\Http\Request;

class AnalysisReportController extends Controller
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
        $formFields = $request->validate(
            [
                'crime_id' => 'required',
                'arrest' => 'required',
                'officer_in_charge' => 'required',
                'court' => 'required',
                'remand' => 'required',
                'jailed' => 'required',
                'remarks' => 'required',
            ]
        );

        // dd($formFields);

        AnalysisReport::create($formFields);

        return back()->with('message', 'Analysis Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnalysisReport  $analysisReport
     * @return \Illuminate\Http\Response
     */
    public function show(AnalysisReport $analysisReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnalysisReport  $analysisReport
     * @return \Illuminate\Http\Response
     */
    public function edit(AnalysisReport $analysisReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnalysisReport  $analysisReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnalysisReport $analysisReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnalysisReport  $analysisReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnalysisReport $analysisReport)
    {
        //
    }
}
