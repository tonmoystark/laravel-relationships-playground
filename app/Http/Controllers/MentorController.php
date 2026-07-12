<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentorFormRequest;
use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mentors = Mentor::all();
        return view('project3.allMentors', compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('project3.createMentor');
    }

    public function mentorsData()
    {
        //
        $mentors = Mentor::all();
        return view('project3.manageMentors', compact('mentors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MentorFormRequest $request)
    {
        //
        $mentor = new Mentor();
        $mentor->name = $request->name;
        $mentor->email = $request->email;
        $mentor->phone = $request->phone;
        $mentor->job_title = $request->job_title;
        $mentor->image = $request->file('image')->store('mentorsImages', 'public');
        $mentor->save();
        return redirect('/mentor');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mentor $mentor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mentor $mentor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mentor $mentor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mentor $mentor)
    {
        //
    }
}
