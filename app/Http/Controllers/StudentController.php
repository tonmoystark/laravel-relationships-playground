<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();
        return view('allStudents', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('createStudent');
    }

    public function createProfile(int $id)
    {
        $student = Student::findOrFail($id);
        return view('createProfile', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->image = $request->file('image')->store('studentsImages', 'public');
        $student->save();
        return redirect('/student');
    }

    public function storeProfile(Request $request, int $id)
    {
        //
        $student = Student::with('profile')->findOrFail($id);
        $student->profile()->create([
            'phone' => $request->phone,
            'address' => $request->address,
            'guardian_name' => $request->guardian_name,
        ]);
        return redirect("/student/$id");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $student = Student::with('profile')->findOrFail($id);
        return view('showStudent', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $student = Student::findOrFail($id);
        return view('editStudent', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        $student = Student::with('profile')->findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->image = $request->file('image')->store('studentsImages', 'public');
        $student->update();
        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/student');
    }
}
