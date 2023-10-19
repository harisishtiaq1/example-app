<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users-list', [UserController::class, 'show'])->name('users-list');
Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::view('/tables', 'tables')->name('tables');

Route::get('/viewform', [UserController::class, 'formview'])->name('view-form');

Route::post('/users/update', [UserController::class, 'update'])->name('users.update');

Route::get('delete_records/{id}', [UserController::class, 'destroy'])->name('user.destroy');