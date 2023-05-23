<?php

use App\Http\Controllers\ProductosController;
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
    Route::get('/show'          , [ProductoController::class , 'show'])     ->name('product.show');
    Route::get('/{id}/edit'     , [ProductosController::class, 'edit'])     ->name('product.edit');
    Route::put('/{id}'          , [ProductosController::class, 'update'])   ->name('product.update');
    Route::get('/{id}/destroy'  , [ProductosController::class, 'destroy'])  ->name('product.destroy');

});

