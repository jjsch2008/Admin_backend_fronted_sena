<?php

use App\Http\Controllers\AprendiceController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputadoreController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TrainingCenterController;
use Illuminate\Support\Facades\Route;

Route::apiResource('areas', AreaController::class);
Route::apiResource('training-centers', TrainingCenterController::class);
Route::apiResource('computadores', ComputadoreController::class);
Route::apiResource('teachers', TeacherController::class);
Route::apiResource('cursos', CursoController::class);
Route::apiResource('aprendices', AprendiceController::class);
