<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::fallback(fn() => redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::view('/', 'auth.login');
});

Route::middleware('auth')->group(function () {
    Route::resource('/projects', ProjectController::class);

    Route::resource('/tasks-project', TaskProjectController::class);

    Route::get('profile', [UserController::class, 'edit'])->name('users.edit');
    Route::put('profile/update', [UserController::class, 'update'])->name('users.update');
});