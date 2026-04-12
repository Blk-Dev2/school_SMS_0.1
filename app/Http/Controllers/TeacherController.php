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
        // أضف with('subject') لضمان جلب بيانات المادة المرتبطة
        $teachers = Teacher::with('subject')->get(); 
        return view('teachers.index', compact('teachers'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all(); // جلب كل المواد من القاعدة
        return view('teachers.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject_id' => $request->subject_id, // تأكد أن هذا الاسم يطابق الـ name في الـ select
            'subject' => '', // لتجنب الخطأ القديم مؤقتاً
        ]);

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
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'successfully update');
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
