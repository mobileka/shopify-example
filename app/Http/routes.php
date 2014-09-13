<?php

Route::get('/', function() {
    return Redirect::route('stores.index');
});

Route::resource('stores', 'StoreController', ['only' => ['index', 'create', 'store', 'destroy']]);
Route::get('stores/setStoreToken/{id}', ['as' => 'stores.setStoreToken', 'uses' => 'StoreController@setStoreToken']);

Route::resource('stores.hooks', 'HookController', ['only' => ['index', 'create', 'store', 'destroy']]);
Route::get('auth', ['as' => 'auth', 'uses' => 'AuthController@index']);
