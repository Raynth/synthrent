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
Route::group(['namespace' => 'User'], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('producten', 'ProductsController@index')->name('producten.index');
    Route::get('producten/{product}', 'ProductsController@show')->name('producten.show');
    Route::get('producten_naam', 'ProductsController@showName')->name('producten.showName');
    Route::get('zoeken', 'ProductsController@searchAutocomplete')->name('producten.searchAutocomplete');
    Route::get('zoek', 'ProductsController@search')->name('producten.search');

    Route::get('over_ons', 'AboutUsController@index')->name('over_ons');
    
    Route::get('merk/{merk}', 'MarksController@index')->name('merk.index');
    
    Route::get('categorie/{categorie}', 'CategoriesController@index')->name('categorieen.index');
    
    Route::get('winkelwagen', 'CartController@show')->name('winkelwagen.show');
    Route::post('item-toevoegen/{id}', 'CartController@addTocart')->name('winkelwagen.itemtoevoegen');
    Route::get('item-verwijderen/{id}', 'CartController@removeItem')->name('winkelwagen.itemverwijderen');

    Route::get('verhuren', 'RentalsController@store')->name('verhuren.store');    
    
    Route::get('kassa', 'PaymentsController@getPayment')->name('kassa.betalen');
    Route::get('controleer-betaling', 'PaymentsController@checkPayment')->name('kassa.controleren');
    Route::get('betaling-voltooid', 'PaymentsController@paymentCompleted')->name('kassa.voltooid');

    Route::get('account', 'CustomerAccountController@index')->name('account.index');
    Route::get('account-bewerken', 'CustomerAccountController@edit')->name('account.edit');
    Route::post('account-bewerken/{id}', 'CustomerAccountController@update')->name('account.update');
    Route::get('wachtwoord-bewerken', 'CustomerAccountController@editPassword')->name('account.edit-password');
    Route::post('wachtwoord-bewerken/{id}', 'CustomerAccountController@updatePassword')->name('account.update-password');

    Route::get('contact', 'ContactController@create')->name('contact.create');
    Route::post('contact/{id}', 'ContactController@store')->name('contact.store');

    Route::post('reviews', 'ReviewsController@store')->name('reviews.store');
});

// Admin Routes
Route::group(['namespace' => 'Admin'], function() {
    Route::get('admin/home', 'DashboardController@index')->name('admin.home');    
    Route::get('admin/dashboard/index', 'DashboardController@index')->name('dashboard.index');
    Route::get('admin/dashboard/chartsales', 'DashboardController@chartSales')->name('dashboard.chartsales');
    Route::resource('admin/producten', 'ProductsController', ['as' => 'admin']);
    Route::resource('admin/categorieen', 'CategoriesController', ['as' => 'admin']);
    Route::resource('admin/klanten', 'UsersController', ['as' => 'admin']);
    Route::resource('admin/verhuren', 'RentalsController', ['as' => 'admin']);
    Route::resource('admin/merken', 'MarksController', ['as' => 'admin']);
    Route::resource('admin/admins', 'AdminsController', ['as' => 'admin']);
    Route::resource('admin/rollen', 'RolesController', ['as' => 'admin']);
    Route::resource('admin/reviews', 'ReviewsController', ['as' => 'admin'])->except(['create', 'store']);    
    // Admin Auth Routes
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
    Route::post('admin-logout', 'Auth\LoginController@logout')->name('admin.logout');
});
Auth::routes();
