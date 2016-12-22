<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(["prefix"=>"API", "namespace"=>"API"],function(){
    Route::group(["prefix"=>"/user"],function(){
        Route::get('/','UserController@allUser');
        Route::get('/package','UserController@usersWithPackages');
        Route::get('/detail','UserController@Details');
        Route::get('/userDetail','UserController@usersDetail');
        Route::get('/{id}',"UserController@userById");
        Route::get('/package/{id}','UserController@userWithPackages');
        Route::get('/detail/{id}','UserController@Detail');
        Route::get('/userDetail/{id}','UserController@userDetail');


    });
    Route::group(['prefix'=>'/product'],function (){
        Route::get('/','ProductController@products');
        Route::get('/package',"ProductController@productPackages");
        Route::get('/{id}',"ProductController@product");
        Route::get('/package/{id}',"ProductController@productPackage");
    });

});



