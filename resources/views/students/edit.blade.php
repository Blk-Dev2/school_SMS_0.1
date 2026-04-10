@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modify student information: {{ $student->name }}</h2>
    
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $student->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $student->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Age</label>
            <input type="number" name="age" value="{{ $student->subject }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>School level</label>
            <input type="text" name="grade" value="{{ $student->phone }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-warning">Apply Changes</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection