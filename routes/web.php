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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function (){
    Route::get('category', 'admin\CategoryController@index')->name('category');
    Route::post('category/add', 'admin\CategoryController@store')->name('category.add');

    Route::get('product', 'admin\ProductController@index')->name('product');
    Route::post('product/add', 'admin\ProductController@store')->name('product.add');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
