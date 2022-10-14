<?php

use App\Http\Controllers\Operator\MotorcycleTypeController;
use App\Http\Controllers\Pages\HomeController as HomeControllerPages;
use App\Http\Controllers\Pages\AddressController as AddressControllerPages;
use App\Http\Controllers\Pages\DashboardController as DashboardControllerPages;;
use App\Http\Controllers\Operator\DashboardController as DashboardControllerOperators;
use App\Http\Controllers\Operator\OwnerController as OwnerControllerOperators;
use App\Http\Controllers\Operator\AdminController as AdminControllerOperators;
use App\Http\Controllers\Operator\CustomerController as CustomerControllerOperators;
use App\Http\Controllers\Operator\MotorcycleController as MotorcycleControllerOperators;
use App\Http\Controllers\Operator\MotorcycleBrandsController as MotorcycleBrandsControllerOperators;
use App\Http\Controllers\Operator\MotorcycleTypeController as MotorcycleTypeControllerOperators;
use App\Http\Controllers\Operator\TransactionController as TransactionControllerOperators;
use App\Http\Controllers\Operator\PaymentController as PaymentControllerOperators;
// use App\Http\Controllers\Pages\HomeController as HomeControllerPages;
use App\Http\Controllers\Pages\MotorcycleController as MotorcycleControllerPages;
use App\Http\Controllers\Pages\SettingController as SettingControllerPages;
use App\Http\Controllers\Pages\TransactionController as TransactionControllerPages;
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
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isOperator'])->group(function(){
    Route::prefix('operator')->group(function(){
        Route::controller(DashboardControllerOperators::class)->group(function() {
            Route::get('/dashboard', 'index');
        });
        Route::controller(OwnerControllerOperators::class)->group(function() {
            Route::get('/owner', 'index');
        });
        Route::controller(AdminControllerOperators::class)->group(function() {
            Route::get('/admin', 'index');
        });
        Route::controller(CustomerControllerOperators::class)->group(function() {
            Route::get('/customer', 'index');
            Route::get('/customer-edit/{id}','edit');
            Route::put('/customer-update/{id}','update');
        });
        Route::controller(MotorcycleControllerOperators::class)->group(function() {
            Route::get('/motorcycle', 'index');
        });
        Route::controller(MotorcycleBrandsControllerOperators::class)->group(function() {
            Route::get('/motorcycle-brand', 'index');
        });
        Route::controller(MotorcycleTypeControllerOperators::class)->group(function() {
            Route::get('/motorcycle-type', 'index');
        });
        Route::controller(TransactionControllerOperators::class)->group(function() {
            Route::get('/transaction', 'index');
        });
        Route::controller(PaymentControllerOperators::class)->group(function() {
            Route::get('/payment', 'index');
        });
        // Route::controller(Dasb)  
        Route::resource('motorcycletype', MotorcycleTypeController::class);
 
    });
});

Route::middleware('auth')->group(function() {
    Route::prefix('/v2')->group(function() {
        Route::controller(DashboardControllerPages::class)->group(function() {
            Route::get('/dashboard', 'index');
            Route::get('/update-dashboard', 'update');
        });
        
        Route::controller(SettingControllerPages::class)->group(function() {
            Route::get('/change_password', 'change_password');
            Route::put('/update_password', 'update_password');
            Route::put('/update_profile', 'update_profile');
        });
        
        Route::controller(TransactionControllerPages::class)->group(function() {
            Route::get('/transaction', 'index');
        });

        Route::middleware(['isOwner'])->group(function() {
            Route::resource('/address', AddressControllerPages::class);
            Route::resource('/motorcycle', MotorcycleControllerPages::class);
        });
    });
});
