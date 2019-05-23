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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/rates', 'HomeController@rates')->name('rates');

Route::group(['prefix'=>'calc'], function(){
    Route::get('/contributions', 'HomeController@calcContribution')->name('calc.contribution');
    Route::get('/credit/{credit}', 'HomeController@calcCredit')->name('calc.credit');
});

Route::group(['prefix'=>'admin', 'namespace'=> 'Admin', 'middleware'=>['auth', 'check_role']], function(){
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::get('/accounts', 'AccountController@index', ['as'=> 'admin'])->name('admin.accounts');
    Route::get('/contract/{contract}', 'ContractController@show')->name('admin.contract');
    Route::resource('/credits', 'CreditController', ['as'=> 'admin']);
    Route::resource('/contributions', 'ContributionController', ['as'=> 'admin']);
});

Route::group(['prefix'=>'profile', 'middleware'=>['auth']],function (){
    Route::get('/', 'RoomController@index')->name('profile.view');
    Route::get('/edit', 'RoomController@edit')->name('profile.edit');
    Route::put('/update', 'RoomController@update')->name('profile.update');
    Route::post('/open/contribution', 'RoomController@openContribution')->name('profile.open.contribution');
    Route::post('/open/credit', 'RoomController@openCredit')->name('profile.open.credit');
    Route::get('/contract/{contract}', 'RoomController@showContract')->name('profile.contract');
    Route::get('/accounts', 'RoomController@showAccount')->name('profile.accounts');
    Route::get('/payments/{account}', 'RoomController@showPayment')->name('profile.payments');
});

Auth::routes();


