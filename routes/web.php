<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cart', action: [CartController::class, 'index'])->name('cart');
    Route::post('/addtocart', [CartController::class, 'store'])->name('cart.store');
    Route::get('/checkout', action: [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/order', action: [CheckoutController::class, 'order'])->name('order');
    Route::get('/myorder', action: [OrderController::class, 'index'])->name('order-status');
});

Route::get('/shop', action: [ProductController::class, 'index'])->name('shop');
Route::get('/product/{id}', action: [ProductController::class, 'single'])->name('single');
Route::get('/detect-image', [ProductController::class, 'detectImage'])->name('detect');
Route::post('/up-foto', [ProductController::class, 'store_photo'])->name('photo.store');

Route::get('/', function () {
    return view('frontend.home');
})->name('home');
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/product', function () {
    return view('frontend.single-product');
})->name('single-product');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

require __DIR__ . '/auth.php';
