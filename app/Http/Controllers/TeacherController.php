<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Subject ;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $teachers = Teacher::with('subject')->get(); 
        return view('teachers.index', compact('teachers'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $subjects = \App\Models\Subject::all();
        
        
        $allClasses = \App\Models\SchoolClass::all(); 
        
        return view('teachers.create', compact('subjects', 'allClasses'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers',
            'subject_id' => 'required', 
        ]);

        
        $teacher = \App\Models\Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject_id' => $request->subject_id, 
        ]);

        
        if ($request->has('class_ids')) {
            $teacher->schoolClasses()->attach($request->class_ids);
        }

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully!');
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
    public function edit($id)
    {
        $teacher = \App\Models\Teacher::findOrFail($id);
        
        
        $subjects = \App\Models\Subject::all();
        $allClasses = \App\Models\SchoolClass::all(); 

        return view('teachers.edit', compact('teacher', 'subjects', 'allClasses'));
    }

    public function update(Request $request, $id)
    {
        $teacher = \App\Models\Teacher::findOrFail($id);

        
        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject_id' => $request->subject_id,
        ]);

        
        if ($request->has('class_ids')) {
            $teacher->schoolClasses()->sync($request->class_ids);
        } else {
            $teacher->schoolClasses()->detach(); 
        }

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Deleted has been success');
    }
}
