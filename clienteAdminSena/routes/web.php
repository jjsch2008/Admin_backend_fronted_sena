<?php

use App\Http\Controllers\AprendiceController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputadorController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TrainingCenterController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'inicio')->name('inicio');

Route::resource('training-centers', TrainingCenterController::class);
Route::resource('areas', AreaController::class);
Route::resource('cursos', CursoController::class);
Route::resource('aprendices', AprendiceController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('computadores', ComputadorController::class);
