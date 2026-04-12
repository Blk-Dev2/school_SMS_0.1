@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Student List</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary">+Add New Student</a>
    </div>
              @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>level</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>

                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->schoolClass->class_name ?? 'None' }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Modify</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Permanently delete this')">
                          Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection