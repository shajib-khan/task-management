<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

//Route::get('/', function () {
 //   return view('welcome');
//});

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
Route::get('/',[TaskController::class, 'index'])->name('task.view');
Route::get('/task-create',[TaskController::class,'create'])->name('task.create');
Route::Post('/task-store',[TaskController::class,'store'])->name('store.task');
Route::get('/edit-task/{task}',[TaskController::class,'edit'])->name('edit.task');
Route::post('/update-task/{task}',[TaskController::class,'update'])->name('update.task');
Route::get('/delete-task/{task}',[TaskController::class,'delete'])->name('delete.task');
