<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Applications\AppController;

/*
|--------------------------------------------------------------------------
| User Authentication
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'guest'])->group(function () {
    Route::get('/login', [UserLoginController::class, 'show'])->name('login');
    Route::post('/login', [UserLoginController::class, 'login'])->name('user.login');
});

/*
|--------------------------------------------------------------------------
| User Protected Area
|--------------------------------------------------------------------------
*/
Route::middleware([
        'auth',
        'user_is_active',
        'is_user',
    ])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        Route::get('/applications', [AppController::class, 'index'])
            ->name('app');

        // 🔐 HR ONLY
        Route::middleware('permission:hr')->group(function () {
            Route::get('/applications/human-resource', [AppController::class, 'app'])
                ->name('human_resource');
        });

        Route::get('/logout', [LogoutController::class, 'logout'])
            ->name('logout');
    });
