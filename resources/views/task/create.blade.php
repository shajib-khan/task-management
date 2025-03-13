@extends('task.master')
@section('content')

<a href="{{ route('task.view') }}" class="mt-2 mb-2 btn btn-primary">All Task</a>
<form action="{{route('store.task')}}" method="POST">
    @csrf
    <div>
        <div class="card">
            <div class="card-header bg-dark text-white">Create Task</div>
            <div class="card-body">
                <!---name--->
                <div class="mb-3">
                    <label for="user_id" class="form-label">Select User:</label>
                    <select name="user_id" id="user_id" class="form-select" required>
                        <option value="">-- Choose a User --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{$user->id}}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <!-- Due Date -->
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" required>
                    @error('due_date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <!-- Priority -->
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select class="form-select" id="priority" name="priority" required>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>

                    </select>
                    @error('priority')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Create Task</button>
            </div>
        </div>
    </div>
</form>

@endsection
