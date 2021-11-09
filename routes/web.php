<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    HomeController
};

use App\Http\Controllers\User\{
    CheckoutController, 
    DashboardController as UserDashboard
};

use App\Http\Controllers\Admin\{
    DashboardController as AdminDashboard,
    CheckoutController as AdminCheckout
};
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


//scoalite Routes
Route::get('sign-in-google', [UserController::class,'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class,'HandleProviderCallback'])->name('user.google.callback');

Route::get('dashboard', [HomeController::class,'dashboard'])->name('dashboard');

Route::middleware(['auth'])->group(function(){

    //checkout Routes
    Route::get('checkout/success', [CheckoutController::class,'success'])->name('checkout.success')->middleware('ensureUserRole:user');
    Route::get('checkout/{camp:slug}', [CheckoutController::class,'create'])->name('checkout.create')->middleware('ensureUserRole:user');
    Route::post('checkout/{camp}', [CheckoutController::class,'store'])->name('checkout.store')->middleware('ensureUserRole:user');

    //Dashboard Routes
    Route::get('dashboard', [HomeController::class,'dashboard'])->name('dashboard');

    //Dashboard User
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function(){
        Route::get('/', [UserDashboard::class,'index'])->name('dashboard');
    });
    //Dashboard Admin
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function(){
        Route::get('/', [AdminDashboard::class,'index'])->name('dashboard');

        //AdminChekout
        Route::post('checkout/{checkout}', [AdminCheckout::class,'update'])->name('checkout.update');
    });

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
