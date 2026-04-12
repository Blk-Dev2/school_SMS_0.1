@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modify teacher information: {{ $teacher->name }}</h2>
    
    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $teacher->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $teacher->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Subject</label>
            <select name="subject_id" class="form-control">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $teacher->subject_id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $teacher->phone }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-warning">Apply Changes</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection