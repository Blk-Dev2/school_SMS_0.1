@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary me-3">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <h2 class="fw-bold mb-0">Modify Student: <span class="text-primary">{{ $student->name }}</span></h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <h5 class="text-primary border-bottom pb-2 mb-3">
                                <i class="fas fa-info-circle me-2"></i> Basic Information
                            </h5>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Full Name</label>
                                    <input type="text" name="name" value="{{ $student->name }}" class="form-control form-control-lg border-0 bg-light" required>
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
                                    <input type="date" name="date_of_birth" value="{{ $student->date_of_birth }}" class="form-control border-0 bg-light">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Parent Phone</label>
                                    <input type="text" name="parent_phone" value="{{ $student->parent_phone }}" class="form-control border-0 bg-light">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Address</label>
                                    <textarea name="address" class="form-control border-0 bg-light" rows="2">{{ $student->address }}</textarea>
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
                                    <select name="school_class_id" class="form-select border-0" style="background-color: #eef2f7;" required>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}" {{ $student->school_class_id == $class->id ? 'selected' : '' }}>
                                                {{ $class->class_name }} - {{ $class->section }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('students.index') }}" class="btn btn-light px-4">Cancel</a>
                            <button type="submit" class="btn btn-primary px-5 shadow" style="border-radius: 10px; background: linear-gradient(45deg, #f6c23e, #f4b619); border: none; color: #fff;">
                                <i class="fas fa-check-circle me-2"></i> Update Information
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
        box-shadow: 0 0 0 0.25rem rgba(246, 194, 62, 0.25);
        border: 1px solid #f6c23e !important;
    }
</style>
@endsection