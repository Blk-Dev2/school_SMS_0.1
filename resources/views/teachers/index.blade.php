@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Teachers Management</h2>
            <p class="text-muted small">Manage faculty members and their class assignments</p>
        </div>
        <a href="{{ route('teachers.create') }}" class="btn btn-primary px-4 shadow-sm" style="border-radius: 10px; background: linear-gradient(45deg, #4e73df, #224abe); border: none;">
            <i class="fas fa-plus-circle me-2"></i> Add New Teacher
        </a>
    </div>

    <div class="card border-0 shadow-sm mb-4" style="border-radius: 15px;">
        <div class="card-body p-3">
            <form action="{{ route('teachers.index') }}" method="GET" class="row g-2">
                <div class="col-md-10">
                    <div class="input-group">
                        <span class="input-group-text border-0 bg-light"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control border-0 bg-light" placeholder="Search by name, email or subject..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark w-100" style="border-radius: 8px;">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 border-0 text-uppercase small fw-bold">Teacher Info</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold">Subject</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold">Contact</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold">Assigned Classes</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm me-3 bg-soft-primary text-primary d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; background-color: #eef2f7;">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">{{ $teacher->name }}</div>
                                    <div class="text-muted small">{{ $teacher->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-primary border px-3 py-2" style="border-radius: 8px;">
                                <i class="fas fa-book me-1 small"></i> {{ $teacher->subject->name ?? 'Not Set' }}
                            </span>
                        </td>
                        <td>
                            <div class="small"><i class="fas fa-phone-alt me-2 text-muted"></i>{{ $teacher->phone ?? 'N/A' }}</div>
                        </td>
                        <td>
                            <div class="d-flex flex-wrap gap-1">
                                @forelse($teacher->schoolClasses as $class)
                                    <span class="badge bg-soft-info text-info border-0" style="font-size: 0.7rem; background-color: #e0f7fa;">
                                        {{ $class->class_name }}
                                    </span>
                                @empty
                                    <span class="text-muted x-small">Unassigned</span>
                                @endforelse
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-outline-warning border-0 mx-1 shadow-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0 mx-1 shadow-sm" onclick="return confirm('Delete this teacher?')" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .bg-soft-primary { background-color: #e8f0fe; color: #4e73df; }
    .bg-soft-info { background-color: #e3f2fd; color: #0288d1; }
    .table-hover tbody tr:hover { background-color: #f8f9fc; transition: 0.3s; }
    .avatar-sm { font-size: 1.1rem; }
</style>
@endsection