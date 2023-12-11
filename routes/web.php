<?php

use App\Http\Controllers\ProductsController;
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

Auth::routes();

Route::get('/MyProfile', [App\Http\Controllers\HomeController::class, 'index'])->name('MyProfile');

// Products Admin routes
Route::post('/ProductAdd', [ProductsController::class, 'store'])->name('ProductAdd.store');
Route::get('/Admin/Products', [ProductsController::class, 'showProducts'])->name('admin.Products');
Route::delete('/Admin/Products', [ProductsController::class, 'deleteProducts'])->name('/Admin/Products');
Route::put('/ProductUpdate', [ProductsController::class, 'updateProducts'])->name('ProductUpdate');

Route::post('/Admin', [ProductsController::class, 'store'])->name('Admin.store');

Route::get('/Admin', function () {
    return view('admin/AdminPage');
});

Route::get('/Admin/Users', function () {
    return view('admin/Users');
});

