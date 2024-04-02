<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
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


// Products Admin routes
Route::post('/ProductAdd', [ProductsController::class, 'store'])->name('ProductAdd.store');
Route::get('/Admin/Products', [ProductsController::class, 'showProducts'])->name('admin.Products');
Route::delete('/Admin/Products', [ProductsController::class, 'deleteProducts'])->name('/Admin/Products');
Route::put('/ProductUpdate', [ProductsController::class, 'updateProducts'])->name('ProductUpdate');

Route::post('/Admin', [ProductsController::class, 'store'])->name('Admin.store');


Route::get('/Admin/Users', function () {
    return view('admin/Users');
});

Route::get('/productPage', [ProductsController::class, 'showProductsDetail'])->name('productPage');

