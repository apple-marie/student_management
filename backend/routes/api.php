<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login',[UserController::class, 'login']);


// Route::post('/login',[StudentController::class, 'login']);
Route::get('/students',[StudentController::class, 'index']);
Route::get('/search',[StudentController::class, 'search']);
Route::post('/student',[StudentController::class, 'create']);
Route::post('/update/{id}',[StudentController::class, 'update']);
Route::post('/delete/{id}',[StudentController::class, 'delete']);

Route::get('/course',[CourseController::class, 'getCourse']);

