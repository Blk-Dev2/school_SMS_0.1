@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Subject</h2>
    <form action="{{ route('subjects.store') }}" method="POST" class="bg-white p-4 shadow-sm">
        @csrf
        <div class="mb-3">
            <label>Subject Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Subject Code (e.g. MATH101)</label>
            <input type="text" name="code" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Subject</button>
    </form>
</div>
@endsection