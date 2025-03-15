@extends('task.master')

@section('content')
<div class="class mt-2">
    <h3>User Dashboard</h3>
    <a href="{{ route('user.view') }}" class="btn btn-primary mb-2">Your Task</a>
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-primary mb-2">Logout</button>
    </form>

</div>
@endsection
