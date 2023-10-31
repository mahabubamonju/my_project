<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/shop', [HomeController::class, "shop"])->name('shop');
Route::get('/single-product/{id}', [HomeController::class, "singleProduct"])->name('single-product');
Route::get('/cart', [HomeController::class, "cartDisplay"])->name('cart');
Route::get('/checkout', [HomeController::class, "checkoutDisplay"])->name('checkout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [AdminController::class, "index"])->name('dashboard');
    Route::get('/add-category', [AdminController::class, "addCategory"])->name('add.category');
    Route::get('/manage-category', [AdminController::class, "editCategory"])->name('edit.category');

    Route::get('/add-product', [AdminController::class, "addProduct"])->name('add.product');
    Route::get('/manage-product', [AdminController::class, "manageProduct"])->name('manage.product');
    Route::get('/add-carousel', [AdminController::class, "addCarousel"])->name('add.carousel');
    Route::post('/store-category', [AdminController::class, "store"])->name('category.store');
    Route::post('/store-product', [AdminController::class, "pstore"])->name('product.store');
    Route::post('/store-carousel', [AdminController::class, "cstore"])->name('carousel.store');
    Route::get('/update-product/{product}', [AdminController::class, "pEdit"])->name('product.edit');
    Route::post('/updated-product/{product}', [AdminController::class, "pUpdate"])->name('product.edited');
});
