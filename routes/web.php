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



// Customer Routes
Route::group(['namespace' => 'User'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('producten', 'ProductsController@index')->name('producten.index');
    Route::get('producten/{product}', 'ProductsController@show')->name('producten.show');
});

// Admin Routes
Route::group(['namespace' => 'Admin'], function(){
    Route::get('admin/dashboard', 'DashboardController@index')->name('admin.home');    
    // Route::get('admin/dashboard', 'DashboardController@index')->name('admin');
    Route::get('admin/dashboard/index', 'DashboardController@index')->name('dashboard.index');
    Route::get('admin/dashboard/chartsales', 'DashboardController@chartSales')->name('dashboard.chartsales');
    Route::resource('admin/products', 'ProductsController');
    Route::resource('admin/categories', 'CategoriesController');
    Route::resource('admin/customers', 'CustomersController');
    Route::resource('admin/rentals', 'RentalsController');
    Route::resource('admin/productmarks', 'ProductMarksController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
