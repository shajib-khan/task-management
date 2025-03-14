@extends('task.master')

@section('content')
<div class="container mt-4">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
@endif
    <!-- Assign Task Section -->
    <h3>Assign Task</h3>
    <form action="{{ route('tasks.assign', $task->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Select User:</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="">-- Choose a User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Assign</button>
    </form>

    <h4 class="mt-3">Assigned User:</h4>
    <p>{{ $task->user ? $task->user->name : 'Not Assigned' }}</p>

    <!-- Update Task Status Section -->
    <h3 class="mt-4">Update Task Status</h3>
    <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="status" class="form-label">Select Status:</label>
            <select name="status" id="status" class="form-select" required>
                @foreach(['pending', 'in_progress', 'completed', 'cancelled'] as $status)
                    <option value="{{ $status }}" {{ $task->status == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Status</button>
    </form>

    <h4 class="mt-3">Current Status: {{ ucfirst($task->status) }}</h4>
</div>
@endsection
