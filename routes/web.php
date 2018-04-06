<?php

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

// Route::get('/', function () {
//     return view('home');
// })->name('home');

// Admin Routes
Route::group(['namespace' => 'Admin'], function(){
    Route::get('admin', 'DashboardController@index')->name('home');    
    Route::get('admin/index', 'DashboardController@index')->name('admin.index');
    Route::get('dashboard/index', 'DashboardController@index')->name('dashboard.index');
    // Route::get('admin/calculateRentalsPerMonth', 'DashboardController@calculateRentalsPerMonth')->name('admin.calculateRentalsPerMonth');
    Route::resource('admin/products', 'ProductsController');
    Route::resource('admin/categories', 'CategoriesController');
    Route::resource('admin/customers', 'CustomersController');
    Route::resource('admin/rentals', 'RentalsController');
});