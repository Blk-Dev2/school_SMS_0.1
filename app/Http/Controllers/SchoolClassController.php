<?php

namespace App\Http\Controllers;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
    {
        
        $classes = \App\Models\SchoolClass::with('teachers.subject')->get();
        return view('school_classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school_classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    \App\Models\SchoolClass::create([
        
        'class_name'   => $request->grade_level . ' - ' . $request->section, 
        'grade_level'  => $request->grade_level,
        'section'      => $request->section,
        'academic_year'=> $request->academic_year,
    ]);

    return redirect()->route('school-classes.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
