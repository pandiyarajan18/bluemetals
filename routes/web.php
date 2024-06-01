<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuarryController;
use App\Http\Controllers\TruckOwnerController;


Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');

    Route::get('/quarry-reg', [RegisterController::class, 'showquarry'])->middleware('guest')->name('quarry-reg');
    Route::post('/quarryregister', [RegisterController::class, 'quarryreg'])->middleware('guest')->name('quarryregister');

    Route::get('/transport-reg', [RegisterController::class, 'showtransport'])->middleware('guest')->name('transport-reg');
    Route::post('/transportregister', [RegisterController::class, 'transportreg'])->middleware('guest')->name('transportregister');



	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/quarryRequest', [AdminController::class, 'show'])->name('quarryRequest');
    Route::get('/complaints', [AdminController::class, 'cmp'])->name('complaints');

    Route::get('/reg-accept/{id}', [AdminController::class, 'reg_accept'])->name('reg-accept');
    Route::get('/reg-reject/{id}', [AdminController::class, 'reg_reject'])->name('reg-reject');


    Route::get('/quarry-dashboard', [QuarryController::class, 'dashboard'])->name('quarry-dashboard');
    Route::get('/current-orders', [QuarryController::class, 'co_page'])->name('current-orders');
    Route::get('/order-history', [QuarryController::class, 'oh_page'])->name('order-history');
    Route::get('/support-assist', [QuarryController::class, 'sa_page'])->name('support-assist');

    Route::get('/add-product', [QuarryController::class, 'add_product'])->name('add-product');
    Route::post('/store-product', [QuarryController::class, 'store_product'])->name('store-product');
    Route::post('/Quarryconform-order', [QuarryController::class, 'Quarryconform_order'])->name('Quarryconform-order');


    Route::get('/truckOwner-dashboard', [TruckOwnerController::class, 'dashboard'])->name('truckOwner-dashboard');
    Route::get('/to-current-orders', [TruckOwnerController::class, 'co_page'])->name('to-current-orders');
    Route::get('/to-order-history', [TruckOwnerController::class, 'oh_page'])->name('to-order-history');
    Route::get('/customer-support', [TruckOwnerController::class, 'sa_page'])->name('customer-support');
    Route::post('/get-productlist', [TruckOwnerController::class, 'get_product'])->name('get-productlist');

  Route::post('/complaint', [TruckOwnerController::class, 'complaint'])->name('complaint');
    Route::post('/search-product', [TruckOwnerController::class, 'search_product'])->name('search-product');
    Route::post('/drop-quarry', [TruckOwnerController::class, 'drop_quarry'])->name('drop-quarry');
    Route::post('/place-order', [TruckOwnerController::class, 'place_order'])->name('place-order');



	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');


});
