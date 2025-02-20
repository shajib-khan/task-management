@extends('task.master')

@section('content')
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