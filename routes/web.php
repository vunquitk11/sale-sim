<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'admin'
], function () {
    //get
    Route::get('/login','PageAdminController@pageLogin');
    //post
    Route::post('/login','AdminController@postLogin');
    Route::group([
        'middleware' => 'admin'
    ], function () {
        Route::get('/','PageAdminController@pageAdminDashboard');
        //brand
        Route::get('/brands','PageAdminController@pageBrands');
        Route::get('/create-brand','PageAdminController@pageCreateBrand');
        Route::get('/update-brand/{id}','PageAdminController@pageUpdateBrand');
        Route::post('/create-brand','AdminController@postCreateBrand');
        Route::post('/update-brand/{id}','AdminController@postUpdateBrand');

        //category
        Route::get('/categories','PageAdminController@pageCategories');
        Route::get('/create-category','PageAdminController@pageCreateCategory');
        Route::get('/update-category/{id}','PageAdminController@pageUpdateCategory');
        Route::post('/create-category','AdminController@postCreateCategory');
        Route::post('/update-category/{id}','AdminController@postUpdateCategory');
    });
});
