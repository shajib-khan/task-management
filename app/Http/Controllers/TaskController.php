<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('task.index',compact('tasks'));
    }
    public function create( )
    {
        return view('task.create');
    }
    public function store(Request $request)

    {
        $request->validate([
            'title'=>       'required',
            'description'=> 'required',
            'due_date'=>    'required',
            'priority'=>    'required',
            'status'=>      'required',
        ]);
        Task::create($request->all());
        return redirect()->route('task.view')->with('success','Task created Successfully');

    }
    public function delete(Task $task)
    {
        $task->delete();
        return redirect()->route('task.view')->with('delete','Task Deleted Successfully');
    }
    //edit task
    public function edit(Task $task)
    {
        return view('task.edit',compact('task'));
    }
    public function update(Request $request,Task $task)
    {
        $request->validate([
            'title'=>       'required',
            'description'=> 'required',
            'due_date'=>    'required',
            'priority'=>    'required',
            'status'=>      'required',
        ]);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'status' => $request->status,
        ]);
        return redirect()->route('task.view')->with('update','Task Updated Successfully');

    
    }
}
