<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\invoicesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\StripeController;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/Admin', function () {
        return view('admin/AdminPage');
    });
});
Auth::routes(['verify' => true]);

Route::get('/MyProfile', [HomeController::class, 'index'])->name('MyProfile');
Route::delete('/MyProfile/DeleteAccount', [HomeController::class, 'deleteAccount'])->name('DeleteAccount');
Route::put('/MyProfile/UpdatePassword', [HomeController::class, 'updatePass'])->name('UpdatePassword');
Route::post('/MyProfileChange', [HomeController::class, 'changeName'])->name('ChangeName');
Route::put('/PFPChange', [HomeController::class, 'changePFP'])->name('ChangePFP');
Route::get('/Browse', [ProductsController::class, 'showProductsBrowse'])->name('browse');
Route::get('/Browse/search', [ProductsController::class, 'search'])->name('products.search');

// Cart routes

Route::middleware('auth')->group(function () {
    Route::post('/Basket/add/{productId}', [BasketController::class, 'add'])->name('cart.add');
    Route::get('/Basket', [BasketController::class, 'show'])->name('cart.show');
    Route::post('/Basket/remove/{itemId}', [BasketController::class, 'remove'])->name('cart.remove');
});

//Stripe / Checkout routes

Route::get('Basket/Checkout/Order', [StripeController::class, 'index'])->name('order.index');
Route::post('Basket/Checkout/Order/Processing', [StripeController::class, 'checkout'])->name('order.checkout');
Route::get('Basket/Checkout/Order/Success', [StripeController::class, 'success'])->name('order.success');

Route::stripeWebhooks('webhook');

// Products Admin routes
Route::post('/ProductAdd', [ProductsController::class, 'store'])->name('ProductAdd.store');
Route::get('/Admin/Products', [ProductsController::class, 'showProducts'])->name('admin.Products');
Route::delete('/Admin/Products', [ProductsController::class, 'deleteProducts'])->name('/Admin/Products');
Route::put('/ProductUpdate', [ProductsController::class, 'updateProducts'])->name('ProductUpdate');

Route::get('/Admin/Orders', [OrdersController::class, 'showOrders'])->name('admin.Orders');
Route::get('/Admin/Orders/Invoice/{orderId}', [invoicesController::class, 'show'])->name('Admin.Orders.Invoice');

Route::post('/CategoryAdd', [CategoriesController::class, 'store'])->name('Category.store');
Route::get('/Admin/Categories', [CategoriesController::class, 'show'])->name('admin.Categories');
Route::delete('/Admin/Categories', [CategoriesController::class, 'delete'])->name('delete.Categories');
Route::put('/CategoriesUpdate', [CategoriesController::class, 'update'])->name('update.Categories');

Route::post('/Admin', [ProductsController::class, 'store'])->name('Admin.store');

Route::get('/Admin/Users', function () {
    return view('admin/Users');
});

Route::get('/Basket/Checkout', function () {
    return view('checkout');
});

Route::get('/productPage', [ProductsController::class, 'showProductsDetail'])->name('productPage');
Route::post('/productPage', [ProductsController::class, 'storeComment'])->name('products.comments.store');

