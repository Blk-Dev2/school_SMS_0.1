@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Class</h2>
    <form action="{{ route('school-classes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Class Level</label>
            <input type="text" name="class_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Group(e.g., 1 or 3)</label>
            <input type="text" name="section" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Class</button>
    </form>
</div>
@endsection