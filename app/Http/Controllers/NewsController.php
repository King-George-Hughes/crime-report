<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\CrimeType;
use App\Models\EmergencyType;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Stevebauman\Location\Facades;
use Stevebauman\Location\Facades\Location;

class NewsController extends Controller
{
    // Show all news
    public function index(Request $request)
    {
        $ip = '154.160.21.7';
        // $ip = request()->ip();
        $location = Location::get($ip);
        // dd($data);

        // $news = News::all();
        // return view('welcome',compact('news'));
        $allCrimeTypes = CrimeType::all();
        $allEmergencyTypes = EmergencyType::all();
        $news = News::latest()->paginate(6);
        return view('news.index',compact('news','allCrimeTypes','location','allEmergencyTypes'));
    }

    // Show Create news page
    public function create()
    {
        return view('news.show');
    }

    // Submit News to database
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->file('image'));
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('images','public');
        }
        $formFields['user_id'] = auth()->id();
        
        News::create($formFields);
        
        return back()->with('message', 'News created Successfully!');
    }

    // Show single news
    public function show(News $new)
    {
        return view('news.single-news', [
            'new' => $new
        ]);
    }
    
    // Show edit news page
    public function edit(News $new)
    {
        // dd($new);
        // if($new->user_id !== auth()->id()){
        //     abort(403, 'Unauthorized Action');
        // }

        return view('news.edit', ['new' => $new]);
    }

    // Update edited news
    public function update(Request $request, News $new)
    {
        // Make sure logged in user is owner
        // if($new->user_id !== auth()->id()){
        //     abort(403, 'Unauthorized Action');
        // }

        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('image')){
            $formFields['image'] = $request->file('image')->store('images','public');
        }
        $new->update($formFields);
        
        return back()->with('message', 'News updated Successfully!');
    }

    // Manage News
    public function manage(){
        $user = Auth::user();
        $crimes = Crime::where('user_id',$user->id)->orderBy('id','desc')->get();
        return view('news.manage', compact('user','crimes'));
    }

    // Delete News
    public function destroy(News $new)
    {
        // Make sure logged in user is owner
        if($new->user_id !== auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $new->delete();

        return redirect('/')->with('message', 'News Deleted Successfully!');
    }
}