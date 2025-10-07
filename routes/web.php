<?php

use App\Http\Controllers\TareasController;
use Illuminate\Support\Facades\Route;

Route::get("/", [TareasController::class,'index'])->name('tareas.index');
Route::post("/tareas", [TareasController::class,'store'])->name('tareas.store');
Route::put("/tareas/{tarea}", [TareasController::class,'update'])->name('tareas.update');
Route::delete("/tareas/{tarea}", [TareasController::class,"destroy"])->name("tareas.destroy");
Route::patch("/tareas/{tarea}/toggle", [TareasController::class, 'toggle'])->name('tareas.toggle'); 
