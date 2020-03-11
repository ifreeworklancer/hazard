<?php

Route::group([
    'namespace' => 'Api',
], function () {
    Route::post('/register', 'ApiRegisterController@register');
    Route::post('/login', 'ApiLoginController@login');
    Route::post('/logout', 'ApiLoginController@logout');

    Route::get('quality', 'PagesController@quality')->name('quality');
    Route::get('privacy-policy', 'PagesController@privacy')->name('privacy');
    Route::get('contact', 'PagesController@contact')->name('contact');
    Route::get('shipping', 'PagesController@shipping')->name('shipping');

    Route::group([
        'prefix' => 'categories',
    ], function () {
        Route::get('/', 'CategoriesController@index');
        Route::get('{category}', 'CategoriesController@show');
    });

    Route::group([
        'prefix' => 'products',
    ], function () {
        Route::get('{product}', 'ProductsController@show');
    });

    Route::group([
        'prefix' => 'basket',
    ], function (){
        Route::get('/', 'BasketController@index')->name('index');
        Route::post('{product}', 'BasketController@add')->name('add');
        Route::patch('{basket}', 'BasketController@update')->name('update');
        Route::delete('{basket}', 'BasketController@destroy')->name('destroy');
    });

    Route::group([
        'prefix' => 'order'
    ], function (){
        Route::post('create', 'ApiOrderController@create')->name('create');
    });
});


