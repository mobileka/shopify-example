<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('stores', 'StoreController', ['only' => ['index', 'create', 'store', 'destroy']]);
Route::get('stores/setStoreToken/{id}', ['as' => 'stores.setStoreToken', 'uses' => 'StoreController@setStoreToken']);
Route::resource('stores.hooks', 'HookController', ['only' => ['index', 'create', 'store', 'destroy']]);
Route::get('auth', ['as' => 'auth', 'uses' => 'AuthController@index']);
