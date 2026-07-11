<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentFormRequest;
use App\Http\Requests\CreateProfileFormRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function studentsData()
    {
        //
        $students = Student::all();
        return view('studentData', compact('students'));
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
    public function store(AddStudentFormRequest $request)
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

    public function storeProfile(CreateProfileFormRequest $request, int $id)
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
    public function showProfile(int $id)
    {
        //
        $student = Student::with('profile')->findOrFail($id);
        return view('editProfile', compact('student'));
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

    public function editProfile(CreateProfileFormRequest $request, int $id)
    {
        $student = Student::with('profile')->findOrFail($id);
        $student->profile->phone = $request->phone;
        $student->profile->address = $request->address;
        $student->profile->guardian_name = $request->guardian_name;
        $student->profile->update();
        return redirect("/student/$id");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddStudentFormRequest $request, int $id)
    {
        //
        $student = Student::with('profile')->findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($student->image);
            $student->image = $request->file('image')->store('studentsImages', 'public');
        }
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
        if ($student->image) {
            Storage::disk('public')->delete($student->image);
        }
        $student->delete();
        return redirect('/student');
    }
}
