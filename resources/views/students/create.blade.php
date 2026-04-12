@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Student</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Age</label>
            <input type="number" name="age" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>class</label>
            <select name="school_class_id" class="form-control" required>
                <option value="">-- Class--</option>
                
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">
                        {{ $class->class_name }} - {{ $class->section }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection