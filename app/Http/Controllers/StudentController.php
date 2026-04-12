<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = \App\Models\Student::all(); 
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
        //
        $classes = \App\Models\SchoolClass::all(); 
        
        // 
        return view('students.create', compact('classes'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \App\Models\Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'school_class_id' => $request->school_class_id, 
        ]);

        return redirect()->route('students.index')->with('success', 'Student added and assigned to class!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $classes = \App\Models\SchoolClass::all(); 
        return view('students.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'school_class_id' => $request->school_class_id,
        ]);
        return redirect()->route('students.index')->with('success', 'Updated!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = \App\Models\Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Deleted has been success');
    }
}
