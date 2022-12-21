<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Emergency;
use App\Models\Feedback;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $crimes = Crime::all();
        $emergency = Emergency::all();
        $news = News::all();
        $feedbacks = Feedback::all();
        return view('admin.dashboard', compact('users','crimes','emergency','news', 'feedbacks'));
    }

    public function manage_users(){
        // $users = User::latest()->paginate(10);
        $users = User::latest()->filter(request(['search']))->paginate(10);
        return view('admin.manage-users', compact('users'));
    }
    
    public function manage_crimes(){
        $crimes = Crime::latest()->paginate(10);
        return view('admin.manage-crimes', compact('crimes'));
    }

    public function manage_emergencies(){
        $emergencies = Emergency::latest()->paginate(10);
        return view('admin.manage-emergencies', compact('emergencies'));
    }

    public function manage_news(){
        // $news = News::latest()->paginate(5);
        $news = News::latest()->filter(request(['search']))->paginate(6);

        return view('admin.manage-news', compact('news'));
    }

    public function manage_feedbacks(){
        $feedbacks = Feedback::latest()->paginate(5);
        return view('admin.manage-feedbacks', compact('feedbacks'));
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}