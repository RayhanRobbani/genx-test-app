<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
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
Route::post('/brands/update/{brand}', [BrandController::class, 'update'])->name('brands.update');
Route::delete('/brands/destroy/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
