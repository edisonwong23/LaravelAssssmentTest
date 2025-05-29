<?php

use App\Http\Controllers\Api\UserApiController;
use Illuminate\Support\Facades\Route;

// Didn't use middleware since its accessible to all
// Resource routes for users (index, create, store, show, edit, update, destroy)
Route::resource('users', UserApiController::class)->except(['show']);
// Export users to Excel
Route::get('users/export', [UserApiController::class, 'export'])->name('users.export');
// Bulk delete users
Route::post('users/bulkdelete', [UserApiController::class, 'bulkDelete'])->name('users.bulkdelete');
