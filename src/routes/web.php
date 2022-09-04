<?php

use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [OrdersController::class, 'index'])->name('home');
Route::post('/orders/delete', [OrdersController::class, 'destroy']);
Route::get('/orders/edit/{orderId}', [OrdersController::class, 'edit']);
Route::post('/orders/update/{orderId}', [OrdersController::class, 'update']);
Route::get('/orders/create', [OrdersController::class, 'create']);
Route::post('/orders/store', [OrdersController::class, 'store']);
Route::get('/orders/seed', [OrdersController::class, 'seed']);
