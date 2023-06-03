<?php

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function (){
        return view('admin.index');
    })->name('admin');

    Route::group(['prefix' => 'categories'], function (){
        Route::get('/', '\App\Http\Controllers\Categories\CategoryController@index')->name('category.index');
        Route::get('/create', '\App\Http\Controllers\Categories\CategoryController@create')->name('category.create');
        Route::get('/show/{category}', '\App\Http\Controllers\Categories\CategoryController@show')->name('category.show');
        Route::post('/', '\App\Http\Controllers\Categories\CategoryController@store')->name('category.store');
        Route::get('/edit/{category}', '\App\Http\Controllers\Categories\CategoryController@edit')->name('category.edit');
        Route::patch('/edit/{category}', '\App\Http\Controllers\Categories\CategoryController@update')->name('category.update');
        Route::delete('/delete/{category}', '\App\Http\Controllers\Categories\CategoryController@delete')->name('category.delete');
    });

    Route::group(['prefix' => 'products'], function (){
        Route::get('/', '\App\Http\Controllers\Products\ProductController@index')->name('product.index');
        Route::get('/show/{product}', '\App\Http\Controllers\Products\ProductController@show')->name('product.show');
        Route::get('/create', '\App\Http\Controllers\Products\ProductController@create')->name('product.create');
        Route::post('/store', '\App\Http\Controllers\Products\ProductController@store')->name('product.store');
        Route::patch('/product/{product}', '\App\Http\Controllers\Products\ProductController@edit')->name('product.edit');
        Route::delete('/delete/{product}', '\App\Http\Controllers\Products\ProductController@delete')->name('product.delete');
    });
});
