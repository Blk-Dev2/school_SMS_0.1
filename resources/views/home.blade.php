
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="mb-4 text-center">School Management Dashboard</h2>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-primary text-white shadow-sm mb-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Students</h5>
                            <h2 class="display-4">{{ $studentsCount }}</h2>
                            <a href="{{ route('students.index') }}" class="text-white">View Details →</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-success text-white shadow-sm mb-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Teachers</h5>
                            <h2 class="display-4">{{ $teachersCount }}</h2>
                            <a href="{{ route('teachers.index') }}" class="text-white">View Details →</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-info text-white shadow-sm mb-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Subjects</h5>
                            <h2 class="display-4">{{ $subjectsCount }}</h2>
                            <a href="#" class="text-white">View Details →</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-warning text-dark shadow-sm mb-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Classes</h5>
                            <h2 class="display-4">{{ $classesCount }}</h2>
                            <a href="{{ route('school-classes.index') }}" class="text-white">View Details →</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection