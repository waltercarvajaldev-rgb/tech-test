<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectTaskController;
use App\Http\Controllers\CommentController;

// Públicas 
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protegidas 
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/projects', [ProjectTaskController::class, 'indexProjects']);
    Route::post('/projects', [ProjectTaskController::class, 'storeProject']);
    Route::get('/tasks/{project_id}', [ProjectTaskController::class, 'indexTasks']);
    Route::post('/tasks', [ProjectTaskController::class, 'storeTask']);
    Route::patch('/tasks/{id}/complete', [ProjectTaskController::class, 'completeTask']);
    Route::post('/comments', [ProjectTaskController::class, 'storeComment']);
    Route::get('/comments/{taskId}', [CommentController::class, 'index']);
});
