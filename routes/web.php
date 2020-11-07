<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', 'ProductController', ['only' => ['index', 'show']]);
Route::get('products/image', 'ProductController@image')->name('products.image');
