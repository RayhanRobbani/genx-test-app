<?php

use App\Http\Controllers\AboutUsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;

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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginUser'])->name('user.login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerUser'])->name('user.register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/settings', [SettingController::class, 'settings'])->name('settings');
Route::post('/settings/update', [SettingController::class, 'updateSettings'])->name('settings.update');
Route::post('/password/update', [SettingController::class, 'updatePassword'])->name('password.update');

Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brands/edit/{brand}', [BrandController::class, 'edit'])->name('brands.edit');
Route::put('/brands/update/{brand}', [BrandController::class, 'update'])->name('brands.update');
Route::delete('/brands/destroy/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

Route::get('/about-us', [AboutUsController::class, 'index'])->name('aboutUs.index');
Route::get('/about-us/create', [AboutUsController::class, 'create'])->name('aboutUs.create');
Route::post('/about-us/store', [AboutUsController::class, 'store'])->name('aboutUs.store');
Route::get('/about-us/edit/{about}', [AboutUsController::class, 'edit'])->name('aboutUs.edit');
Route::put('/about-us/update/{about}', [AboutUsController::class, 'update'])->name('aboutUs.update');
Route::delete('/about-us/destroy/{about}', [AboutUsController::class, 'destroy'])->name('aboutUs.destroy');

Route::get('/coupons', [CouponController::class, 'index'])->name('coupons.index');
Route::get('/coupons/create', [CouponController::class, 'create'])->name('coupons.create');
Route::post('/coupons/store', [CouponController::class, 'store'])->name('coupons.store');
Route::get('/coupons/edit/{coupon}', [CouponController::class, 'edit'])->name('coupons.edit');
Route::put('/coupons/update/{coupon}', [CouponController::class, 'update'])->name('coupons.update');
Route::delete('/coupons/destroy/{coupon}', [CouponController::class, 'destroy'])->name('coupons.destroy');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/edit/{service}', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/update/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/destroy/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
