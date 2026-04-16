@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary me-3">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <h2 class="fw-bold mb-0">Add New Student</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <h5 class="text-primary border-bottom pb-2 mb-3">
                                <i class="fas fa-info-circle me-2"></i> Basic Information
                            </h5>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Full Name</label>
                                    <input type="text" name="name" class="form-control form-control-lg border-0 bg-light" placeholder="Enter student's full name" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-primary border-bottom pb-2 mb-3">
                                <i class="fas fa-user-tag me-2"></i> Personal & Contact Details
                            </h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Date of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control border-0 bg-light">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Parent Phone</label>
                                    <input type="text" name="parent_phone" class="form-control border-0 bg-light" placeholder="+213 ...">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Address</label>
                                    <textarea name="address" class="form-control border-0 bg-light" rows="2" placeholder="Street, City..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="text-primary border-bottom pb-2 mb-3">
                                <i class="fas fa-school me-2"></i> Academic Assignment
                            </h5>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Assign to Class</label>
                                    <select name="school_class_id" class="form-select border-0 bg-light-blue" style="background-color: #eef2f7;" required>
                                        <option value="" selected disabled>Select a class</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}">
                                                {{ $class->class_name }} - {{ $class->section }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="reset" class="btn btn-light px-4">Reset</button>
                            <button type="submit" class="btn btn-primary px-5 shadow" style="border-radius: 10px; background: linear-gradient(45deg, #4e73df, #224abe);">
                                <i class="fas fa-save me-2"></i> Save Student
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    
    .form-control:focus, .form-select:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        border: 1px solid #4e73df !important;
    }
</style>
@endsection