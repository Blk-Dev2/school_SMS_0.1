<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = \App\Models\Subject::all();
        return view('subjects.index', compact('subjects'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('subjects.create'); 
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \App\Models\Subject::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);
        return redirect()->route('subjects.index');
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
    public function destroy($id)
    {
        $subject = \App\Models\Subject::findOrFail($id);
        $subject->delete();
        return redirect()->back()->with('success', 'Subject deleted successfully!');
    }
}
