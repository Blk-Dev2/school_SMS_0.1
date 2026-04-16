@extends('layouts.app')

@section('content')
<div class="container-fluid p-4" style="background-color: #f8f9fc; min-height: 100vh;">
    
    <div class="d-flex justify-content-between align-items-center mb-4 bg-white p-3 shadow-sm" style="border-radius: 15px;">
        <div>
            <h2 class="fw-bold text-dark mb-0"><i class="fas fa-users-cog me-2 text-primary"></i>Student Management</h2>
            <small class="text-muted">Manage and monitor student registrations</small>
        </div>
        <a href="{{ route('students.create') }}" class="btn btn-primary px-4 shadow-sm" style="border-radius: 10px; background: linear-gradient(45deg, #4e73df, #224abe); border: none;">
            <i class="fas fa-user-plus me-2"></i>Add New Student
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm d-flex align-items-center mb-4" style="border-radius: 12px; background-color: #d1e7dd; color: #0f5132;">
            <i class="fas fa-check-circle me-3 fa-lg"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    <div class="card border-0 shadow-sm mb-4" style="border-radius: 15px;">
        <div class="card-body p-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="input-group" style="border-radius: 10px; overflow: hidden; background-color: #f1f3f9;">
                        <span class="input-group-text border-0 bg-transparent"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" id="studentSearch" class="form-control border-0 bg-transparent p-3" placeholder="Search by name, class, or phone...">
                    </div>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <span class="badge bg-light text-dark p-2 px-3 border"><i class="fas fa-info-circle me-1"></i> Total Students: {{ count($students) }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background-color: #4e73df; color: white;">
                    <tr>
                        <th class="ps-4 border-0 py-3">Student Name</th>
                        <th class="border-0 py-3">Date of Birth</th>
                        <th class="border-0 py-3">Parent Phone</th>
                        <th class="border-0 py-3">Assigned Class</th>
                        <th class="text-center border-0 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody id="studentTableBody">
                    @foreach($students as $student)
                    <tr class="student-row">
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm me-3 bg-soft-primary text-primary d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; background-color: #eef2f7;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="fw-bold text-dark">{{ $student->name }}</span>
                            </div>
                        </td>
                        <td class="text-muted"><i class="far fa-calendar-alt me-2"></i>{{ $student->date_of_birth }}</td>
                        <td><span class="text-dark"><i class="fas fa-phone-alt me-2 text-muted"></i>{{ $student->parent_phone }}</span></td>
                        <td>
                            <span class="badge rounded-pill px-3 py-2" style="background-color: #eef2f7; color: #4e73df; font-weight: 600;">
                                <i class="fas fa-school me-1"></i> {{ $student->schoolClass->class_name ?? 'Not Assigned' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-outline-warning btn-sm border-0 mx-1 rounded shadow-sm" title="Modify">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm border-0 mx-1 rounded shadow-sm" onclick="return confirm('Are you sure you want to permanently delete this student?')" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div id="noResults" class="text-center py-5 d-none">
            <i class="fas fa-search-minus fa-3x text-muted mb-3"></i>
            <p class="text-muted fw-bold">No students found matching your search.</p>
        </div>
    </div>
</div>

<script>
    document.getElementById('studentSearch').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('.student-row');
        let hasResults = false;

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            if (text.includes(filter)) {
                row.style.display = '';
                hasResults = true;
                row.style.animation = 'fadeIn 0.4s';
            } else {
                row.style.display = 'none';
            }
        });

        // إظهار رسالة "لا توجد نتائج"
        document.getElementById('noResults').classList.toggle('d-none', hasResults);
        document.querySelector('table').classList.toggle('d-none', !hasResults);
    });
</script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .table-hover tbody tr:hover {
        background-color: #f8f9fc !important;
        cursor: pointer;
        transition: 0.3s ease;
    }
    
    .btn-outline-warning:hover { background-color: #f6c23e; color: white; }
    .btn-outline-danger:hover { background-color: #e74a3b; color: white; }
    
    
    .table-responsive::-webkit-scrollbar {
        height: 6px;
    }
    .table-responsive::-webkit-scrollbar-thumb {
        background: #cbd5e0;
        border-radius: 10px;
    }
</style>
@endsection