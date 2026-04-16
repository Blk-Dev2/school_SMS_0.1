@extends('layouts.app')

@section('content')
<div class="container-fluid p-4" style="background-color: #f8f9fc; min-height: 100vh;">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0">School Overview</h2>
            <p class="text-muted mb-0">Analytics and school statistics dashboard</p>
        </div>
        <div class="text-end">
            <span class="badge bg-white text-primary shadow-sm p-3" style="border-radius: 10px; border-left: 4px solid #4e73df;">
                <i class="far fa-calendar-alt me-2"></i>{{ now()->format('l, d M Y') }}
            </span>
        </div>
    </div>
    
    <div class="row g-4">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm stat-card h-100" style="background: linear-gradient(45deg, #4e73df, #224abe); border-radius: 15px;">
                <div class="card-body p-4 text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small fw-bold mb-2" style="opacity: 0.8;">Total Students</h6>
                            <h2 class="display-6 fw-bold mb-0">{{ $studentsCount }}</h2>
                        </div>
                        <div class="icon-shape bg-white text-primary rounded-circle shadow-lg d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2) !important;">
                            <i class="fas fa-user-graduate fa-2x text-white"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('students.index') }}" class="text-white text-decoration-none small fw-bold">
                            View Students List <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm stat-card h-100" style="background: linear-gradient(45deg, #1cc88a, #13855c); border-radius: 15px;">
                <div class="card-body p-4 text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small fw-bold mb-2" style="opacity: 0.8;">Teachers</h6>
                            <h2 class="display-6 fw-bold mb-0">{{ $teachersCount }}</h2>
                        </div>
                        <div class="icon-shape rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2);">
                            <i class="fas fa-chalkboard-teacher fa-2x text-white"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('teachers.index') }}" class="text-white text-decoration-none small fw-bold">
                            Manage Faculty <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm stat-card h-100" style="background: linear-gradient(45deg, #36b9cc, #258391); border-radius: 15px;">
                <div class="card-body p-4 text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small fw-bold mb-2" style="opacity: 0.8;">Subjects</h6>
                            <h2 class="display-6 fw-bold mb-0">{{ $subjectsCount }}</h2>
                        </div>
                        <div class="icon-shape rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2);">
                            <i class="fas fa-book fa-2x text-white"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('subjects.index') }}" class="text-white text-decoration-none small fw-bold">
                            Curriculum <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm stat-card h-100" style="background: linear-gradient(45deg, #f6c23e, #dda20a); border-radius: 15px;">
                <div class="card-body p-4 text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase small fw-bold mb-2" style="opacity: 0.8;">Classes</h6>
                            <h2 class="display-6 fw-bold mb-0">{{ $classesCount }}</h2>
                        </div>
                        <div class="icon-shape rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2);">
                            <i class="fas fa-school fa-2x text-white"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('school-classes.index') }}" class="text-white text-decoration-none small fw-bold">
                            View Sections <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold text-dark">Newly Registered Students</h5>
                    <span class="badge bg-soft-primary text-primary px-3">Recent 5</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle">
                            <thead class="bg-light text-muted small text-uppercase">
                                <tr>
                                    <th>Student</th>
                                    <th>Class</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentStudents ?? [] as $recent)
                                <tr class="border-bottom">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-light p-2 me-2 text-primary" style="width: 35px; height: 35px; text-align: center; font-size: 12px;">
                                                {{ substr($recent->name, 0, 1) }}
                                            </div>
                                            <span class="fw-bold small">{{ $recent->name }}</span>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-light text-secondary">{{ $recent->schoolClass->class_name ?? 'N/A' }}</span></td>
                                    <td class="small">{{ $recent->parent_phone }}</td>
                                    <td><a href="{{ route('students.edit', $recent->id) }}" class="btn btn-sm btn-link text-primary"><i class="fas fa-external-link-alt"></i></a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4 small italic">No recent registrations available.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; background-color: #4e73df;">
                <div class="card-body p-4 text-white">
                    <h5 class="fw-bold mb-3">Welcome, Admin!</h5>
                    <p class="small mb-4" style="opacity: 0.9;">You have full control over the school system. Quick actions are available below to save your time.</p>
                    
                    <div class="d-grid gap-2">
                        <a href="{{ route('students.create') }}" class="btn btn-light text-primary fw-bold p-3 text-start border-0 shadow-sm" style="border-radius: 12px;">
                            <i class="fas fa-plus-circle me-2"></i> Register New Student
                        </a>
                        <a href="{{ route('school-classes.create') }}" class="btn btn-light text-primary fw-bold p-3 text-start border-0 shadow-sm" style="border-radius: 12px;">
                            <i class="fas fa-door-open me-2"></i> Open New Class
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .stat-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .bg-soft-primary {
        background-color: rgba(78, 115, 223, 0.1);
    }
</style>
@endsection