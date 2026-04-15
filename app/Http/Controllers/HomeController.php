<?php

namespace App\Http\Controllers;
use App\Models\Student; 
use App\Models\Teacher; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        
        $studentsCount = \App\Models\Student::count();
        $teachersCount = \App\Models\Teacher::count();
        $subjectsCount = \App\Models\Subject::count();
        $classesCount  = \App\Models\SchoolClass::count();

        
        return view('home', compact('studentsCount', 'teachersCount', 'subjectsCount', 'classesCount'));
    }
}
