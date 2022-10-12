<?php

use App\Http\Controllers\Pages\AddressController as AddressControllerPages;
use App\Http\Controllers\Pages\DashboardController as DashboardControllerPages;
use App\Http\Controllers\Pages\HomeController as HomeControllerPages;
use App\Http\Controllers\Pages\MotorcycleController as MotorcycleControllerPages;
use App\Http\Controllers\Pages\SettingController as SettingControllerPages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeControllerPages::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    Route::prefix('/v2')->group(function() {
        Route::controller(DashboardControllerPages::class)->group(function() {
            Route::get('/dashboard', 'index');
        });
        
        Route::controller(SettingControllerPages::class)->group(function() {
            Route::get('/change_password', 'change_password');
        });

        Route::middleware(['isOwner'])->group(function() {
            Route::resource('/address', AddressControllerPages::class);
            Route::resource('/motorcycle', MotorcycleControllerPages::class);
        });
    });
});
