
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>All Classes</h2>
        <a href="{{ route('school-classes.create') }}" class="btn btn-primary">Add New Class</a>
    </div>

        <table class="table table-hover align-middle mb-0">
        <thead style="background-color: #4e73df; color: white;">
            <tr>
                <th class="ps-4 border-0 py-3">Class Name (Full)</th>
                <th class="border-0 py-3">Grade Level</th>
                <th class="border-0 py-3">Section/Group</th>
                <th class="border-0 py-3">Academic Year</th>
                <th class="text-center border-0 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
            <tr class="class-row">
                <td class="ps-4">
                    <a href="{{ route('students.index', ['class_id' => $class->id]) }}" class="text-decoration-none fw-bold text-primary">
                        <i class="fas fa-chalkboard me-2"></i> {{ $class->class_name }}
                    </a>
                </td>
                <td><span class="badge bg-light text-dark">{{ $class->grade_level }}</span></td>
                <td><span class="badge bg-soft-primary text-primary">{{ $class->section }}</span></td>
                <td><i class="far fa-calendar-alt me-1 text-muted"></i> {{ $class->academic_year }}</td>
                <td class="text-center">

                    <div class="btn-group">
                        <a href="{{ route('students.index', ['class_id' => $class->id]) }}" class="btn btn-sm btn-outline-info border-0 shadow-sm mx-1" title="View Students">
                            <i class="fas fa-users"></i>
                        </a>

                        
                        <button type="button" class="btn btn-sm btn-outline-info border-0 shadow-sm mx-1" 
                            data-bs-toggle="modal" 
                            data-bs-target="#teachersModal{{ $class->id }}" 
                            title="View Teachers">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </button>

                    <div class="modal fade" id="teachersModal{{ $class->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                                <div class="modal-header bg-light border-0 py-3">
                                    <h5 class="modal-title fw-bold text-dark">
                                        <i class="fas fa-users text-primary me-2"></i> Teachers for {{ $class->class_name }}
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">
                                    <ul class="list-group list-group-flush">
                                        @forelse($class->teachers as $teacher)
                                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 border-light">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-soft-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: #eef2f7;">
                                                        <i class="fas fa-user-tie text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 fw-bold small text-dark">{{ $teacher->name }}</h6>
                                                        <span class="text-muted x-small">{{ $teacher->subject->name ?? 'No Subject' }}</span>
                                                    </div>
                                                </div>
                                                <span class="badge bg-light text-primary border rounded-pill small px-3">Active</span>
                                            </li>
                                        @empty
                                            <div class="text-center py-4">
                                                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" width="60" class="mb-3 opacity-50">
                                                <p class="text-muted mb-0">No teachers assigned to this class yet.</p>
                                            </div>
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="border-radius: 8px;">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection