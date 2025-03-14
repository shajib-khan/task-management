<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
   return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//custom route
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin',[TaskController::class, 'index'])->name('task.view');
    Route::get('/task-create',[TaskController::class,'create'])->name('task.create');
    Route::Post('/task-store',[TaskController::class,'store'])->name('store.task');
    Route::get('/edit-task/{task}',[TaskController::class,'edit'])->name('edit.task');
    Route::post('/update-task/{task}',[TaskController::class,'update'])->name('update.task');
    Route::get('/delete-task/{task}',[TaskController::class,'delete'])->name('delete.task');
    // Assign Task (Only Admin Can Assign Tasks)
    Route::post('tasks/{task}/assign', [TaskController::class, 'assign'])->name('tasks.assign');
});

//user task

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-dashboard',[TaskController::class,'user'])->name('user.dashboard');
    Route::get('/user',[TaskController::class,'userView'])->name('user.view');
    Route::get('/task/{task}', [TaskController::class, 'show'])->name('task.show');
});


//need access this route both user & admin
Route::post('tasks/{task}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');

