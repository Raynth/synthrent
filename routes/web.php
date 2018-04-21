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
    Route::get('productmerk/{productmerk}', 'ProductsController@productMarkShow')->name('productmerk.show');
    Route::post('voeg-item-toe/{id}', 'ProductsController@addTocart')->name('producten.addtocart');
    Route::get('winkelwagen', 'ProductsController@cart')->name('producten.cart');
    Route::get('kassa', 'ProductsController@getCheckout')->middleware('auth')->name('producten.checkout');
    Route::post('kassa', 'ProductsController@postCheckout')->middleware('auth')->name('producten.checkout');
    Route::get('verwijder-item/{id}', 'ProductsController@removeItem')->name('producten.removeitem');
    Route::get('account', 'CustomerAccountController@index')->name('account.index');
    Route::get('account-bewerken', 'CustomerAccountController@edit')->name('account.edit');
    Route::post('account-bewerken/{id}', 'CustomerAccountController@update')->name('account.update');
    Route::get('wachtwoord-bewerken', 'CustomerAccountController@editPassword')->name('account.edit-password');
    Route::post('wachtwoord-bewerken/{id}', 'CustomerAccountController@updatePassword')->name('account.update-password');
});

// Admin Routes
Route::group(['namespace' => 'Admin'], function(){
    Route::get('admin/home', 'DashboardController@index')->name('admin.home');    
    Route::get('admin/dashboard', 'DashboardController@index')->name('admin');
    Route::get('admin/dashboard/index', 'DashboardController@index')->name('dashboard.index');
    Route::get('admin/dashboard/chartsales', 'DashboardController@chartSales')->name('dashboard.chartsales');
    Route::resource('admin/products', 'ProductsController');
    Route::resource('admin/categories', 'CategoriesController');
    Route::resource('admin/customers', 'CustomersController');
    Route::resource('admin/rentals', 'RentalsController');
    Route::resource('admin/productmarks', 'ProductMarksController');
    Route::resource('admin/users', 'UsersController');
    Route::resource('admin/roles', 'RolesController');
    // Admin Auth Routes
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
