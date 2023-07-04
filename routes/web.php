<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProvidersController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::prefix('product')->group(function () {
    Route::get('/'              , [ProductosController::class, 'index'])    ->name('product.index');
    Route::get('/create'        , [ProductosController::class, 'create'])   ->name('product.create');
    Route::post('/create'       , [ProductosController::class, 'store'])    ->name('product.store');
    Route::get('/show'          , [ProductosController::class , 'show'])     ->name('product.show');
    Route::get('/{id}/edit'     , [ProductosController::class, 'edit'])     ->name('product.edit');
    Route::put('/{id}'          , [ProductosController::class, 'update'])   ->name('product.update');
    Route::get('/{id}/destroy'  , [ProductosController::class, 'destroy'])  ->name('product.destroy');

});
Route::prefix('customer')->group(function () {
    Route::get('/'              , [CustomersController::class, 'index'])    ->name('customer.index');
    Route::get('/create'        , [CustomersController::class, 'create'])   ->name('customer.create');
    Route::post('/create'       , [CustomersController::class, 'store'])    ->name('customer.store');
    Route::get('/show'          , [CustomersController::class , 'show'])    ->name('customer.show');
    Route::get('/{id}/edit'     , [CustomersController::class, 'edit'])     ->name('customer.edit');
    Route::put('/{id}'          , [CustomersController::class, 'update'])   ->name('customer.update');
    Route::get('/{id}/destroy'  , [CustomersController::class, 'destroy'])  ->name('customer.destroy');
});
Route::prefix('provider')->group(function () {
    Route::get('/'              , [ProvidersController::class, 'index'])    ->name('provider.index');
    Route::get('/create'        , [ProvidersController::class, 'create'])   ->name('provider.create');
    Route::post('/create'       , [ProvidersController::class, 'store'])    ->name('provider.store');
    Route::get('/show'          , [ProvidersController::class , 'show'])    ->name('provider.show');
    Route::get('/{id}/edit'     , [ProvidersController::class, 'edit'])     ->name('provider.edit');
    Route::put('/{id}'          , [ProvidersController::class, 'update'])   ->name('provider.update');
    Route::get('/{id}/destroy'  , [ProvidersController::class, 'destroy'])  ->name('provider.destroy');
});
Route::prefix('brand')->group(function () {
    Route::get('/'              , [BrandsController::class, 'index'])    ->name('brand.index');
    Route::get('/create'        , [BrandsController::class, 'create'])   ->name('brand.create');
    Route::post('/create'       , [BrandsController::class, 'store'])    ->name('brand.store');
    Route::get('/show'          , [BrandsController::class , 'show'])    ->name('brand.show');
    Route::get('/{id}/edit'     , [BrandsController::class, 'edit'])     ->name('brand.edit');
    Route::put('/{id}'          , [BrandsController::class, 'update'])   ->name('brand.update');
    Route::get('/{id}/destroy'  , [BrandsController::class, 'destroy'])  ->name('brand.destroy');
});


