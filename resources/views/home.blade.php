@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center mt-4">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white p-3">
                                <h3>Students</h3>
                                <p class="display-6">{{ $studentsCount }}</p>
                                <a href="{{ route('students.index') }}" class="text-white mt-2 d-block">View All Students →</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white p-3">
                                <h3>Teachers</h3>
                                <p class="display-6">{{ $teachersCount }}</p>
                                <a href="{{ route('teachers.index') }}" class="text-white mt-2 d-block">View All Teachers →</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-warning text-dark p-3">
                                <h3>Subjects</h3>
                                <p class="display-6">{{ $subjectsCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
