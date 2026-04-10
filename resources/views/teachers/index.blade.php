@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Teachers List</h2>
        <a href="{{ route('teachers.create') }}" class="btn btn-primary">+Add New Teacher</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr class="table-light">
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Phone</th>
                <th>Operation</th> </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->subject }}</td>
                <td>{{ $teacher->phone }}</td>
                <td>
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm text-white">Modify</a>

                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection