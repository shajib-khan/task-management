<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

//Route::get('/', function () {
  //  return view('welcome');
//});



Route::get('/',[TaskController::class, 'index'])->name('task.view');
Route::get('/task-create',[TaskController::class,'create'])->name('task.create');
Route::Post('/task-store',[TaskController::class,'store'])->name('store.task');
Route::get('/edit-task/{task}',[TaskController::class,'edit'])->name('edit.task');
Route::post('/update-task/{task}',[TaskController::class,'update'])->name('update.task');
Route::get('/delete-task/{task}',[TaskController::class,'delete'])->name('delete.task');


