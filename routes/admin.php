<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserPermissionController;

// ADMIN LOGIN (guest only)
Route::prefix('admin')->middleware(['web', 'guest'])->group(function () {
    Route::get('/login', [AdminLoginController::class, 'show'])->name('admin.login.form');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');
});

// ADMIN PROTECTED
Route::prefix('admin')
    ->middleware(['web', 'auth', 'is_active', 'role:admin|super_admin'])
    ->name('admin.')
    ->group(function () {
        // dashboard route
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // users route (loaded from routes/admin/users.php)
        Route::get('/users', [UserController::class, 'index'])->name('users');

        // user permission
        Route::get('/user-permissions', [UserPermissionController::class, 'index'])->name('user_permissions');
        Route::get('/users/{user}/permissions', [UserPermissionController::class, 'edit'])->name('user_permissions.edit');
        Route::post('/users/{user}/permissions', [UserPermissionController::class, 'update'])->name('user_permissions.update');

        // permission route
        Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
        Route::get('/permissions/{user}', [PermissionController::class, 'edit'])->name('permissions.edit');
        Route::post('/permissions/{user}', [PermissionController::class, 'update'])->name('permissions.update');
        Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');

        // rolse route
        Route::get('/roles', [RoleController::class, 'index'])->name('roles');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/roles/{role}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

        // logout route
        Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
    });
