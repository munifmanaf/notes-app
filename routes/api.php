<?php

// routes/api.php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('notes', NoteController::class);

    Route::get('/notes', [NoteController::class, 'index']);
    
    // Create new note (POST /api/notes)
    Route::post('/notes', [NoteController::class, 'store']);
    
    // Get single note (GET /api/notes/{id})
    Route::get('/notes/{note}', [NoteController::class, 'show']);
    
    // Update note (PUT /api/notes/{id})
    Route::put('/notes/{note}', [NoteController::class, 'update']);
    
    // Delete note (DELETE /api/notes/{id})
    Route::delete('/notes/{note}', [NoteController::class, 'destroy']);
});