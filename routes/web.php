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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
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

        //user
        Route::get('/users','PageAdminController@pageUsers');
        Route::get('/create-user','PageAdminController@pageCreateUser');
        Route::get('/update-user/{id}','PageAdminController@pageUpdateUser');
        Route::post('/create-user','AdminController@postCreateUser');
        Route::post('/update-user/{id}','AdminController@postUpdateUser');

        //sim
        Route::get('/sims','PageAdminController@pageSims');
        Route::get('/create-sim','PageAdminController@pageCreateSim');
        Route::post('/create-sim','AdminController@postCreateSim');
        Route::get('/update-sim/{id}','PageAdminController@pageUpdateSim');
        Route::post('/update-sim/{id}','AdminController@postUpdateSim');

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

        //book
        Route::get('/blog-categories','PageAdminController@pageBooks');
        Route::get('/create-blog-category','PageAdminController@pageCreateBook');
        Route::get('/update-blog-category/{id}','PageAdminController@pageUpdateBook');
        Route::post('/create-blog-category','AdminController@postCreateBook');
        Route::post('/update-blog-category/{id}','AdminController@postUpdateBook');

        //post
        Route::get('/posts','PageAdminController@pagePosts');
        Route::get('/create-post','PageAdminController@pageCreatePost');
        Route::get('/update-post/{slug}','PageAdminController@pageUpdatePost');
        Route::post('/create-post','AdminController@postCreatePost');
        Route::post('/update-post/{slug}','AdminController@postUpdatePost');

        //price category 
        Route::get('/create-price-type','PageAdminController@pageCreatePriceType');
        Route::get('/update-price-type/{slug}','PageAdminController@pageUpdateCreatePriceType');

        Route::post('/create-price-type','AdminController@postCreatePriceType');
    });
});
