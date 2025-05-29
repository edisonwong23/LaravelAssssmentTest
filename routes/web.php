<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Resource routes for users (index, create, store, show, edit, update, destroy)
Route::resource('users', UserController::class)->except(['show']);

// Export users to Excel
Route::get('users/export', [UserController::class, 'export'])->name('users.export');

// Bulk delete users
Route::post('users/bulkdelete', [UserController::class, 'bulkDelete'])->name('users.bulkdelete');