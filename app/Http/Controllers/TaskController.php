<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('task.index',compact('tasks'));
    }
    public function create()

    {
        $users =User::all();
        return view('task.create',compact('users'));
    }
    public function store(Request $request)
{
    $request->validate([
        'title'       => 'required',
        'description' => 'required',
        'due_date'    => 'required',
        'priority'    => 'required',
        'status'      => 'required',
        'user_id'     => 'nullable|exists:users,id', // Allow user assignment
    ]);

    Task::create([
        'title'       => $request->title,
        'description' => $request->description,
        'due_date'    => $request->due_date,
        'priority'    => $request->priority,
        'status'      => $request->status,
        'user_id'     => $request->user_id,  // Save user_id
    ]);

    return redirect()->route('task.view')->with('success', 'Task created successfully!');
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

     // Assign task to a user
     public function assign(Request $request, Task $task)
     {
         $request->validate([
             'user_id' => 'required|exists:users,id',
         ]);

         $task->user_id = $request->user_id;
         $task->save();

         return redirect()->back()->with('success', 'Task assigned successfully!');
     }

     // Update task status (handled by admin)
     public function updateStatus(Request $request, Task $task)
     {
         $request->validate([
             'status' => 'required|in:pending,in_progress,completed',
         ]);

         $task->status = $request->status;
         $task->save();

         return redirect()->route('task.view')
                 ->with('success', 'Task status updated successfully!');

     }

     public function show(Task $task)
{
    $users = User::all();
    return view('task.show', compact('task', 'users'));
}



}
