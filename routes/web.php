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

Route::post('/ProductAdd', [ProductsController::class, 'store'])->name('ProductAdd.store');

Route::post('/Admin', [ProductsController::class, 'store'])->name('Admin.store');

Route::get('/Admin', function () {
    return view('admin/AdminPage');
});

Route::get('/Admin/Products', function () {
    return view('admin/Products');
});

Route::get('/Admin/Users', function () {
    return view('admin/Users');
});

