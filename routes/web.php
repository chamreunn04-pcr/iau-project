<?php

use App\Http\Controllers\Settings\SettingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Language Switch
|--------------------------------------------------------------------------
*/

Route::get('lang/{lang}', function ($lang) {
    if (!in_array($lang, ['en', 'km'])) {
        abort(400);
    }

    Session::put('locale', $lang);
    App::setLocale($lang);

    return redirect()->back();
})->name('lang.switch');

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::middleware('web')->group(function () {

    Route::get('/', fn() => view('app.auth.user-login'))->name('home');
    // settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');

    require __DIR__ . '/admin.php';
    require __DIR__ . '/user.php';
    require __DIR__ . '/audit.php';
    require __DIR__ . '/hr.php';
    require __DIR__ . '/accounting.php';
    require __DIR__ . '/planning.php';
});
