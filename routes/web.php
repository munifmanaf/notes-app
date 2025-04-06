<?php

// routes/web.php
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// Authentication routes should be outside the auth middleware
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('notes', NoteController::class)->except(['show']);
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    
    // Show create note form
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    
    // Store new note
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    
    // Show edit note form
    Route::get('/notes/edit/{id}', [NoteController::class, 'edit'])->name('notes.edit');
    
    // Update existing note
    Route::put('/notes/{id}', [NoteController::class, 'update'])->name('notes.update');
    
    // Delete note
    Route::delete('/notes/delete/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
});