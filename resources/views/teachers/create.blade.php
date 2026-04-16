@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary me-3 shadow-sm" style="border-radius: 10px;">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <h2 class="fw-bold mb-0 text-dark">Add New Teacher</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div style="background: linear-gradient(45deg, #4e73df, #224abe); padding: 20px;">
                    <h5 class="text-white mb-0"><i class="fas fa-user-plus me-2"></i> Teacher Registration Form</h5>
                </div>

                <div class="card-body p-5 bg-white">
                    <form action="{{ route('teachers.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-5">
                            <h5 class="text-primary fw-bold border-bottom pb-2 mb-4">
                                <i class="fas fa-id-card me-2"></i> Professional Profile
                            </h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light"><i class="fas fa-user text-muted"></i></span>
                                        <input type="text" name="name" class="form-control border-0 bg-light" placeholder="e.g. Dr. Ahmed Mansour" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light"><i class="fas fa-envelope text-muted"></i></span>
                                        <input type="email" name="email" class="form-control border-0 bg-light" placeholder="email@school.com" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light"><i class="fas fa-phone text-muted"></i></span>
                                        <input type="text" name="phone" class="form-control border-0 bg-light" placeholder="+213 ...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase">Specialized Subject</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light"><i class="fas fa-book-open text-muted"></i></span>
                                        <select name="subject_id" class="form-select border-0 bg-light" required>
                                            <option value="" selected disabled>Select Subject</option>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h5 class="text-primary fw-bold border-bottom pb-2 mb-4">
                                <i class="fas fa-layer-group me-2"></i> Class Assignments
                            </h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold small text-uppercase">Assign to Classes (Select one or more)</label>
                                    <select name="class_ids[]" class="form-select border-0 bg-light-blue p-3" style="background-color: #f0f3f9; min-height: 120px;" multiple required>
                                        @foreach($allClasses as $class)
                                            <option value="{{ $class->id }}" class="py-2">
                                                📁 {{ $class->class_name }} - {{ $class->academic_year }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="form-text mt-2 text-muted">
                                        <i class="fas fa-info-circle me-1"></i> Hold <strong>Ctrl</strong> (Windows) or <strong>Command</strong> (Mac) to select multiple classes.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 pt-3 border-top">
                            <button type="reset" class="btn btn-light px-4 fw-bold text-secondary" style="border-radius: 12px;">Reset</button>
                            <button type="submit" class="btn btn-primary px-5 shadow-lg fw-bold" style="border-radius: 12px; background: linear-gradient(45deg, #4e73df, #224abe); border: none;">
                                <i class="fas fa-check-circle me-2"></i> Confirm & Save Teacher
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* تحسينات إضافية لتجربة المستخدم */
    .form-control, .form-select {
        padding: 12px 15px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        background-color: #fff !important;
        box-shadow: 0 10px 20px rgba(78, 115, 223, 0.1) !important;
        border: 1px solid #4e73df !important;
        transform: translateY(-2px);
    }

    .input-group-text {
        border-radius: 10px 0 0 10px !important;
    }

    .form-control {
        border-radius: 0 10px 10px 0 !important;
    }

    select[multiple] {
        border-radius: 15px !important;
    }

    select[multiple] option:checked {
        background: #4e73df linear-gradient(0deg, #4e73df 0%, #4e73df 100%);
        color: white;
    }
</style>
@endsection