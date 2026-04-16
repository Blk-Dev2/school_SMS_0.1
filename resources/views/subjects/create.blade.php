@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('subjects.index') }}" class="btn btn-outline-secondary me-3 shadow-sm" style="border-radius: 10px;">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="fw-bold mb-0 text-dark">Subjects Management</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                <div style="background: linear-gradient(45deg, #2ecc71, #27ae60); padding: 25px;">
                    <h5 class="text-white mb-0 fw-bold text-center">
                        <i class="fas fa-book-medical me-2"></i> Add New Subject
                    </h5>
                </div>

                <div class="card-body p-5 bg-white">
                    <form action="{{ route('subjects.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted">Subject Name</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-light">
                                    <i class="fas fa-book text-success"></i>
                                </span>
                                <input type="text" name="name" class="form-control border-0 bg-light p-3" 
                                       placeholder="e.g. Mathematics, Physics..." required style="border-radius: 0 12px 12px 0;">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted">Subject Code</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-light">
                                    <i class="fas fa-barcode text-success"></i>
                                </span>
                                <input type="text" name="code" class="form-control border-0 bg-light p-3" 
                                       placeholder="e.g. MATH101, PHYS202" required style="border-radius: 0 12px 12px 0;">
                            </div>
                            <div class="form-text mt-2 small text-muted">
                                <i class="fas fa-info-circle me-1"></i> Use a unique identifier for the curriculum.
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-5">
                            <button type="submit" class="btn btn-success py-3 fw-bold shadow-sm" 
                                    style="border-radius: 12px; background-color: #27ae60; border: none;">
                                <i class="fas fa-save me-2"></i> Save Subject
                            </button>
                            <a href="{{ route('subjects.index') }}" class="btn btn-link text-muted fw-bold text-decoration-none">
                                Cancel and Go Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    
    .form-control:focus {
        background-color: #fff !important;
        box-shadow: 0 10px 20px rgba(46, 204, 113, 0.1) !important;
        border: 1px solid #2ecc71 !important;
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }
    .input-group-text {
        border-radius: 12px 0 0 12px !important;
    }
</style>
@endsection