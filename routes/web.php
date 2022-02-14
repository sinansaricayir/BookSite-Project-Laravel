<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.','middleware'=>['auth','AdminCtrl']],function () {

        Route::get('/', 'indexController@index')->name('index');



    Route::group(['namespace'=>'yayinevi','prefix'=>'yayinevi','as'=>'yayinevi.'],function () {
        Route::get('/', 'indexController@index')->name('index');
        Route::get('/ekle', 'indexController@create')->name('create');
        Route::post('/ekle', 'indexController@store')->name('create.post');
        Route::get('/duzenle/{id}', 'indexController@edit')->name('edit');
        Route::post('/ekle/{id}', 'indexController@update')->name('edit.post');
        Route::get('/sil/{id}', 'indexController@delete')->name('delete');




    });











});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
