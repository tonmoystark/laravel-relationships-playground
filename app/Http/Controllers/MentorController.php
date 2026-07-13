<?php

namespace App\Http\Controllers;

use App\Http\Requests\MentorFormRequest;
use App\Http\Requests\UpdateMentorRequest;
use App\Models\Course;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function show(int $id)
    {
        //
        $mentor = Mentor::with('courses')->findOrFail($id);

        $courses = Course::all();

        return view('project3.showMentor', compact('mentor', 'courses'));
    }

    public function assignCourse(Request $request, int $id)
    {
        $mentor = Mentor::findOrFail($id);
        $mentor->courses()->syncWithoutDetaching($request->course_id);
        return back();
    }

    public function unassignCourse(int $mentorID, int $courseID)
    {
        $mentor = Mentor::findOrFail($mentorID);
        $mentor->courses()->detach($courseID);

        return back();
    }

    public function syncCourses(Request $request, int $id)
    {
        $mentor = Mentor::findOrFail($id);
        $mentor->courses()->sync($request->courses);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('project3.editMentor', compact('mentor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMentorRequest $request, int $id)
    {
        //
        $mentor = Mentor::findOrFail($id);
        $mentor->name = $request->name;
        $mentor->email = $request->email;
        $mentor->phone = $request->phone;
        $mentor->job_title = $request->job_title;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($mentor->image);
            $mentor->image = $request->file('image')->store('mentorsImages', 'public');
        }
        $mentor->update();
        return redirect('/mentor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $mentor = Mentor::findOrFail($id);
        if ($mentor->image) {
            Storage::disk('public')->delete($mentor->image);
        }
        $mentor->delete();
        return redirect('/mentor/manage');
    }
}
