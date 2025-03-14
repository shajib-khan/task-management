@extends('task.master')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Title</th>
            <th>Description</th>
            <th>Due Date</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->user->name }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->due_date }}</td>
                <td>{{ $task->priority }}</td>
               
                <td>
                    <a href="{{ route('task.show', $task->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('edit.task', $task->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('delete.task', $task->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
