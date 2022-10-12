<?php

use App\Http\Controllers\Operator\MotorcycleTypeController;
use App\Http\Controllers\Pages\HomeController as HomeControllerPages;
use App\Models\MotorcycleType;
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



Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isOperators'])->group(function(){
    Route::prefix('/admin')->group(function(){
        
        Route::resource('motorcycletype', MotorcycleTypeController::class);
 
    });
});

Route::get('/book/{id}/show', [UserBookController::class, 'show']);
    
Route::get('/cart/{id}/show', [UserCartController::class, 'index']);
Route::post('/cart/{id}/add', [UserCartController::class, 'store']);
Route::get('/cart/{id}/edit', [UserCartController::class, 'edit']);
Route::put('/cart/{id}', [UserCartController::class, 'update']);
Route::delete('/cart/{id}', [UserCartController::class, 'destroy']);
