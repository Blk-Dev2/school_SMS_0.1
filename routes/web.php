<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
use App\Http\Controllers\StudentController;
Route::resource('students', StudentController::class);


use App\Http\Controllers\TeacherController;
Route::resource('teachers', TeacherController::class);

use App\Http\Controllers\SchoolClassController;
Route::resource('school-classes', SchoolClassController::class);