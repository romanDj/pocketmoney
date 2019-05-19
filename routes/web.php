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

Route::group(['prefix'=>'calc'], function(){
    Route::get('/contributions', 'HomeController@calcContribution')->name('calc.contribution');
    Route::get('/credit/{credit}', 'HomeController@calcCredit')->name('calc.credit');
});


Route::group(['prefix'=>'admin', 'namespace'=> 'Admin', 'middleware'=>['auth']], function(){
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::resource('/types', 'TypeController', ['as'=> 'admin']);
    Route::resource('/credits', 'CreditController', ['as'=> 'admin']);
    Route::resource('/contributions', 'ContributionController', ['as'=> 'admin']);
    Route::get('/offers/create/{type}', 'OfferController@create')->name('admin.offers.create');
    Route::resource('/offers', 'OfferController', ['as'=> 'admin', 'except' => ['create']]);

});

Route::group(['prefix'=>'profile', 'middleware'=>['auth']],function (){
    Route::get('/', 'RoomController@index')->name('profile.view');
    Route::get('/edit', 'RoomController@edit')->name('profile.edit');
    Route::put('/update', 'RoomController@update')->name('profile.update');
    Route::post('/score', 'RoomController@openScore')->name('profile.score');
});

Auth::routes();


