<?php

use App\Http\Controllers\AboutUsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\ProductTagController;
use App\Http\Controllers\ProductUnitController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShippingController;
use App\Models\ProductAttribute;

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

Route::get('/shipping-charges', [ShippingController::class, 'shippingChargesIndex'])->name('shippingCharges.index');
Route::get('/shipping-charges/edit/{shipping_charge}', [ShippingController::class, 'shippingChargesEdit'])->name('shippingCharges.edit');
Route::put('/shipping-charges/update/{shipping_charge}', [ShippingController::class, 'shippingChargesUpdate'])->name('shippingCharges.update');

Route::get('/shipping-providers', [ShippingController::class, 'shippingProvidersIndex'])->name('shippingProviders.index');
Route::get('/shipping-providers/create', [ShippingController::class, 'shippingProvidersCreate'])->name('shippingProviders.create');
Route::post('/shipping-providers/store', [ShippingController::class, 'shippingProvidersStore'])->name('shippingProviders.store');
Route::get('/shipping-providers/edit/{shipping_provider}', [ShippingController::class, 'shippingProvidersEdit'])->name('shippingProviders.edit');
Route::put('/shipping-providers/update/{shipping_provider}', [ShippingController::class, 'shippingProvidersUpdate'])->name('shippingProviders.update');
Route::delete('/shipping-providers/destroy/{shipping_provider}', [ShippingController::class, 'shippingProvidersDestroy'])->name('shippingProviders.destroy');

Route::get('/product-units', [ProductUnitController::class, 'index'])->name('productUnits.index');
Route::get('/product-units/create', [ProductUnitController::class, 'create'])->name('productUnits.create');
Route::post('/product-units/store', [ProductUnitController::class, 'store'])->name('productUnits.store');
Route::get('/product-units/edit/{unit}', [ProductUnitController::class, 'edit'])->name('productUnits.edit');
Route::put('/product-units/update/{unit}', [ProductUnitController::class, 'update'])->name('productUnits.update');
Route::delete('/product-units/destroy/{unit}', [ProductUnitController::class, 'destroy'])->name('productUnits.destroy');

Route::get('/product-tags', [ProductTagController::class, 'index'])->name('productTags.index');
Route::get('/product-tags/create', [ProductTagController::class, 'create'])->name('productTags.create');
Route::post('/product-tags/store', [ProductTagController::class, 'store'])->name('productTags.store');
Route::get('/product-tags/edit/{tag}', [ProductTagController::class, 'edit'])->name('productTags.edit');
Route::put('/product-tags/update/{tag}', [ProductTagController::class, 'update'])->name('productTags.update');
Route::delete('/product-tags/destroy/{tag}', [ProductTagController::class, 'destroy'])->name('productTags.destroy');

Route::get('/product-attributes', [ProductAttributeController::class, 'index'])->name('productAttributes.index');
Route::get('/product-attributes/create', [ProductAttributeController::class, 'create'])->name('productAttributes.create');
Route::post('/product-attributes/store', [ProductAttributeController::class, 'store'])->name('productAttributes.store');
Route::get('/product-attributes/edit/{attribute}', [ProductAttributeController::class, 'edit'])->name('productAttributes.edit');
Route::put('/product-attributes/update/{attribute}', [ProductAttributeController::class, 'update'])->name('productAttributes.update');
Route::delete('/product-attributes/destroy/{attribute}', [ProductAttributeController::class, 'destroy'])->name('productAttributes.destroy');
