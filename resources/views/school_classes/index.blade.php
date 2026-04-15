
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>All Classes</h2>
        <a href="{{ route('school-classes.create') }}" class="btn btn-primary">Add New Class</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Class level</th>
                <th>Group</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
            <tr>
                <td>{{ $class->class_name }}</td>
                <td>{{ $class->section }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection