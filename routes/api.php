<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::middleware('auth:sanctum')->group(function () {
// User Routes
Route::post('/users', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users/update', [UserController::class, 'update']);
Route::post('/users/delete', [UserController::class, 'destroy']);

// Project Routes
Route::post('/projects', [ProjectController::class, 'store']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::post('/projects/update', [ProjectController::class, 'update']);
Route::post('/projects/delete', [ProjectController::class, 'destroy']);

// Timesheet Routes
Route::post('/timesheets', [TimesheetController::class, 'store']);
Route::get('/timesheets', [TimesheetController::class, 'index']);
Route::get('/timesheets/{id}', [TimesheetController::class, 'show']);
Route::post('/timesheets/update', [TimesheetController::class, 'update']);
Route::post('/timesheets/delete', [TimesheetController::class, 'destroy']);

// Logout
Route::post('/logout', [AuthController::class, 'logout']);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/error', [AuthController::class, 'error'])->name('login');
