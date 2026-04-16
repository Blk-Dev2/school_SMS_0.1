@extends('layouts.app')

@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Curriculum & Subjects</h2>
            <p class="text-muted small mb-0">Manage school subjects and their academic codes</p>
        </div>
        <a href="{{ route('subjects.create') }}" class="btn btn-success shadow-sm px-4 py-2" style="border-radius: 12px;">
            <i class="fas fa-plus-circle me-2"></i> Add New Subject
        </a>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 15px; border-left: 5px solid #2ecc71 !important;">
                <div class="d-flex align-items-center">
                    <div class="bg-soft-success p-3 rounded-circle me-3" style="background-color: #eafaf1;">
                        <i class="fas fa-book text-success"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted small">Total Subjects</h6>
                        <span class="fw-bold h5">{{ $subjects->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted">ID</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted">Subject Name</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted text-center">Code</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted text-end pe-4">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                    <tr class="border-bottom-0">
                        <td class="ps-4">
                            <span class="badge bg-light text-dark border px-2 py-1">#{{ $subject->id }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-3 bg-soft-primary d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px; background-color: #f0f4f8;">
                                    <i class="fas fa-graduation-cap text-primary"></i>
                                </div>
                                <span class="fw-bold text-dark">{{ $subject->name }}</span>
                            </div>
                        </td>
                        <td class="text-center">
                            <code class="px-2 py-1 bg-light text-success fw-bold" style="border-radius: 5px;">{{ $subject->code }}</code>
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-sm btn-outline-warning border-0 shadow-sm" title="Edit Subject">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0 shadow-sm" 
                                            onclick="return confirm('Are you sure you want to delete this subject?')" title="Delete Subject">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    @if($subjects->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="80" class="mb-3 opacity-25">
                            <p class="text-muted">No subjects found. Start by adding one!</p>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>

    .table thead th { border-bottom: none; }
    .table tbody tr:hover { background-color: #f9fbff; transition: 0.3s; }
    .bg-soft-primary { background-color: #eef2f7; }
    .btn-sm { padding: 8px 10px; border-radius: 8px; }
</style>
@endsection