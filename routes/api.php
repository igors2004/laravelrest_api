<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('suchanski/310810/students', [StudentController::class, 'index']);
Route::get('suchanski/310810/students/{id}', [StudentController::class, 'show']);
Route::post('suchanski/310810/students/{id}', [StudentController::class, 'update']);
Route::delete('suchanski/310810/students/{id}', [StudentController::class, 'delete']);
Route::post('suchanski/310810/students', [StudentController::class, 'create']);
