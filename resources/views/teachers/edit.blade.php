@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modify teacher information {{ $teacher->name }}</h2>
    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT') <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $teacher->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $teacher->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>subject</label>
            <input type="text" name="subject" value="{{ $teacher->subject }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>phone</label>
            <input type="text" name="phone" value="{{ $teacher->grade }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-warning">Apply</button>
    </form>
</div>
@endsection