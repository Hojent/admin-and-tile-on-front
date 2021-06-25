<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

// Ajax Data
Route::get('load-more-data','HomeController@more_data');
//-----
//Auth::routes();
Auth::routes(['register' => false]);
// Admin Panel
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' =>'auth'],
    function () {
        Route::get('/', 'DashboardController@index')->name('admin');
        Route::resource('/tiles', 'TileController');
    });

//-----



