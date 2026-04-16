@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary me-3 shadow-sm" style="border-radius: 10px;">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <h2 class="fw-bold mb-0 text-dark">Modify Teacher: <span class="text-primary">{{ $teacher->name }}</span></h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div style="background: linear-gradient(45deg, #f6e05e, #ecc94b); padding: 20px;">
                    <h5 class="text-dark mb-0 fw-bold"><i class="fas fa-user-edit me-2"></i> Update Teacher Profile</h5>
                </div>

                <div class="card-body p-5 bg-white">
                    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-5">
                            <h5 class="text-primary fw-bold border-bottom pb-2 mb-4">
                                <i class="fas fa-id-card me-2"></i> Professional Details
                            </h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light"><i class="fas fa-user text-muted"></i></span>
                                        <input type="text" name="name" value="{{ $teacher->name }}" class="form-control border-0 bg-light" placeholder="Full name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light"><i class="fas fa-envelope text-muted"></i></span>
                                        <input type="email" name="email" value="{{ $teacher->email }}" class="form-control border-0 bg-light" placeholder="email@school.com" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light"><i class="fas fa-phone text-muted"></i></span>
                                        <input type="text" name="phone" value="{{ $teacher->phone }}" class="form-control border-0 bg-light" placeholder="+213 ...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase">Subject Specialty</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light"><i class="fas fa-book-open text-muted"></i></span>
                                        <select name="subject_id" class="form-select border-0 bg-light" required>
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}" {{ $teacher->subject_id == $subject->id ? 'selected' : '' }}>
                                                    {{ $subject->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h5 class="text-primary fw-bold border-bottom pb-2 mb-4">
                                <i class="fas fa-school me-2"></i> Class Assignments
                            </h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold small text-uppercase">Teaching in Classes (Multi-select)</label>
                                    <select name="class_ids[]" class="form-select border-0 bg-light-blue p-3" style="background-color: #f0f3f9; min-height: 150px;" multiple required>
                                        @foreach($allClasses as $class)
                                            <option value="{{ $class->id }}" 
                                                {{ $teacher->schoolClasses->contains($class->id) ? 'selected' : '' }}>
                                                📁 {{ $class->class_name }} - {{ $class->academic_year }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="form-text mt-2 text-muted">
                                        <i class="fas fa-info-circle me-1"></i> Selection is preserved. You can hold <strong>Ctrl/Cmd</strong> to modify selection.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 pt-3 border-top">
                            <a href="{{ route('teachers.index') }}" class="btn btn-light px-4 fw-bold text-secondary" style="border-radius: 12px;">Cancel</a>
                            <button type="submit" class="btn btn-warning px-5 shadow-lg fw-bold text-dark" style="border-radius: 12px; border: none;">
                                <i class="fas fa-save me-2"></i> Apply Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control, .form-select { padding: 12px 15px; border-radius: 10px; transition: all 0.3s ease; }
    .form-control:focus, .form-select:focus {
        background-color: #fff !important;
        box-shadow: 0 10px 20px rgba(236, 201, 75, 0.1) !important;
        border: 1px solid #ecc94b !important;
        transform: translateY(-2px);
    }
    .input-group-text { border-radius: 10px 0 0 10px !important; }
    .form-control { border-radius: 0 10px 10px 0 !important; }
    select[multiple] { border-radius: 15px !important; }
    select[multiple] option:checked { background: #4e73df linear-gradient(0deg, #4e73df 0%, #4e73df 100%); color: white; }
</style>
@endsection