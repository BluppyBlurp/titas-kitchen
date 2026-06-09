<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;

// Landing page
Route::get('/', [PageController::class, 'landing']);

// Menu page
Route::get('/menu', [MenuController::class, 'index']);

// Cart page
Route::get('/cart', [PageController::class, 'cart']);

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::post('/menu', [AdminController::class, 'store']);
    Route::get('/menu/{id}/edit', [AdminController::class, 'edit']);
    Route::put('/menu/{id}', [AdminController::class, 'update']);
    Route::delete('/menu/{id}', [AdminController::class, 'destroy']);
    Route::get('/settings', [AdminController::class, 'settings']);
    Route::post('/settings', [AdminController::class, 'updateSettings']);
});