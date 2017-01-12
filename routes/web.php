<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('home', 'HomeController@home');

Route::group(['prefix' => 'product'], function () {
    Route::get('/add', 'ProductController@getAdd');
    Route::post('/add', 'ProductController@postAdd');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/add', 'CategoryController@getAdd');
    Route::post('/add', 'CategoryController@postAdd');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);

    Route::group(['prefix' => 'category'], function () {
        Route::get('/add', 'CategoryController@getAdd');
        Route::post('/add', 'CategoryController@postAdd');

        Route::get('/list', 'CategoryController@getList');

        Route::get('/edit/{id}', 'CategoryController@getEdit');
        Route::post('/edit/{id}', 'CategoryController@postEdit');
        //
        Route::get('/editstt', 'CategoryController@getEditStt');

        Route::get('/delete', 'CategoryController@getDelete');


    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/add', 'ProductController@getAdd');
        Route::post('/add', 'ProductController@postAdd');

        Route::get('/list', 'ProductController@getList');
        Route::get('/detail/{id}', 'ProductController@getDetail');

        Route::get('/edit/{id}', 'ProductController@getEdit');
        Route::post('/edit/{id}', 'ProductController@postEdit');

        Route::get('/delete', 'ProductController@delete');

        Route::get('/delete-image/{id}', 'ProductController@deleteImage');

        Route::get('/edit-status/{id}', 'ProductController@editStatus');
    });

    Route::group(['prefix' => 'addon'], function () {
        Route::get('/add', 'AddonController@getAdd');
        Route::post('/add', 'AddonController@postAdd');

        Route::get('/list', 'AddonController@getList');

        Route::get('/edit/{id}', 'AddonController@getEdit');
        Route::post('/edit/{id}', 'AddonController@postEdit');

        Route::get('/delete', 'AddonController@delete');


        Route::get('/edit-status/{id}', 'AddonController@editStatus');
    });


    Route::group(['prefix' => 'order'], function () {

        Route::get('/list', 'OrderController@getList');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', 'UserController@getList');

        Route::get('/profile',['uses'=> 'UserController@getProfile']);

        Route::post('/upload-avatar', 'UserController@uploadAvatar');
    });

});

Route::get('/profile',['middleware' => 'auth', 'uses'=> 'HomeController@getProfile']);

Route::get('/', 'HomeController@index');

Route::get('/product-list', 'HomeController@getList');

Route::get('/product/{id}', 'HomeController@productDetail');

Route::get('/category/{id}', 'HomeController@category');

Route::get('/addon-detail/{id}', 'HomeController@addonDetail');
Route::get('/cancel', function () {
    echo "can";
});
Route::get('/success', function () {
    echo "success";
});
//Route::get('buy-now/{id}',['middleware' => 'auth', 'uses'=> 'HomeController@buyNow']);

Route::get('buy-now',['uses'=> 'HomeController@buyNow']);

Route::get('add-order/{addon}',['uses'=> 'HomeController@addOrder']);
Route::get('update-order/{id}',[ 'uses'=> 'HomeController@updateOrder']);

Route::get('addon-detail/{id}',['uses'=> 'HomeController@getAddonDetail']);

Route::get('check-order',['uses'=> 'HomeController@checkOrder']);


//Route::post('/paypal/create-payment', function(){
//
//});
//Route::get('cart/{id}', ['middleware' => 'auth','as'=>'cart', 'uses'=>'HomeController@cart'] );