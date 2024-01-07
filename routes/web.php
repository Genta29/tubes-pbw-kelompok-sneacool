<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomizationController;

Route::post('/store-product', [ProductController::class, 'store'])->name('store-product');
Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/kategori/{kategori}', [ProductController::class, 'kategori'])->name('kategori');

Route::get('/my-products', [ProductController::class, 'myProducts'])->name('my-products');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/search-products', [ProductController::class, 'searchProducts'])->name('search-products');

Route::get('/kategori/{kategori}/filter', [ProductController::class, 'filterKategori'])->name('kategori.filter');


Route::get('/customization/history', [CustomizationController::class, 'index'])->name('customization.index');
Route::get('/payment/history', [CustomizationController::class, 'paymentHistory'])->name('paymentHistory');
Route::get('/customization/create/{product_id}', [CustomizationController::class, 'create'])->name('customization.create');
Route::post('/customization/store', [CustomizationController::class, 'store'])->name('customization.store');
Route::get('/customization/brandowner', [CustomizationController::class, 'brandownerCustomizations'])->name('customization.brandownerCustomizations');


Route::patch('/customizations/{customization}/approve', [CustomizationController::class, 'approve'])
    ->name('customization.approve');

Route::patch('/transaction/{transaction}/approve', [CustomizationController::class, 'transactionApp'])
    ->name('transaction.approve');

// Route for rejecting a customization
Route::delete('/customizations/{customization}/reject', [CustomizationController::class, 'reject'])
    ->name('customization.reject');

    Route::post('/customization/confirm-payment/{customization}', [ProductController::class, 'confirmPayment'])->name('customization.Payment');

    Route::get('/customizations/payment/{customization}', [CustomizationController::class, 'payment'])->name('customization.payment');

    Route::get('/payment/{product_id}', [CustomizationController::class, 'directPayment'])->name('direct.payment');
    Route::post('/payment/store', [ProductController::class, 'direct'])->name('direct.ConfirmPayment');

    Route::get('/brand-owners/{brandOwner}', [ProductController::class, 'profil'])->name('brand-owner.show');

    Route::get('/dashboard/user', function () {
        return view('user.dashboard');
    });

    Route::get('/dashboard/owner', function () {
        return view('owner.dashboard');
    });




Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProductController::class, 'index'])->name('welcome');

Route::get('/dashboard', [ProductController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
