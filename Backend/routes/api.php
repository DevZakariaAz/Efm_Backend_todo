<?php

use App\Http\Controllers\api\TaskController;
use App\Http\Controllers\api\TasklistController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::resource('tasklists', \App\Http\Controllers\Api\TaskController::class);

Route::resource('tasklists', TasklistController::class);
Route::resource('tasks', TaskController::class)->except(['edit']);
Route::post('tasks/{id}/edit', [TaskController::class, 'update']);



