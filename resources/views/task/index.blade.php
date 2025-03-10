@extends('task.master')

@section('content')

<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 mt-3">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
@if(session()->has('success'))
<div class="alert alert-success">
  {{session()->get('success')}}
</div>
  @endif
  @if(session()->has('delete'))
<div class="alert alert-success">
  {{session()->get('delete')}}
</div>
  @endif
  @if(session()->has('update'))
  <div class="alert alert-success">
    {{session()->get('update')}}
  </div>
    @endif


<a href="{{ route('task.create') }}" class="btn btn-primary mb-2">Create</a>
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Due Date</th>
          <th scope="col">Priority</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tasks as $task )
        <tr>

          <td>{{$task->id}}</td>
          <td>{{$task->title}}</td>
          <td>{{$task->description}}</td>
          <td>{{$task->due_date}}</td>
          <td>{{$task->priority}}</td>
          <td>{{$task->status}}</td>
          <td>
            <a href="{{route('edit.task', $task->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{route('delete.task',$task->id)}}" class="btn btn-danger">Delete</a>
          </td>




        </tr>
        @endforeach
      </tbody>
    </table>

@endsection
