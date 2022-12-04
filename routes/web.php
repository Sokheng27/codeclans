<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\SalesController;
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

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get('productdetail/{id}', [HomeController::class, 'product_detail'])->name('products.detail');


Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){

    //CRUDCategory
    Route::get('categories/delete/{id}', [CategoriesController::class, 'destroy']);
    Route::resource('categories', CategoriesController::class);

    //CRUDProduct
    Route::get('products/delete/{id}', [ProductsController::class, 'destroy']);
    Route::resource('products', ProductsController::class);

    //SaleReport
    Route::resource('sales', \App\Http\Controllers\admin\SalesController::class);
});

//SaleProduct
Route::post('sale', [SalesController::class, 'store'])->name('sale.store');
