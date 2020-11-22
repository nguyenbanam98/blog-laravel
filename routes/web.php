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

//  font end
Route::get('/', 'HomeController@index');

Route::get('/trang-chu', 'HomeController@index');

// back end
Route::group([

    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',

], function () {

    Route::get('/', 'AdminController@index')->name('index');
    Route::post('/login-admin', 'AdminController@login')->name('login');
    Route::get('/logout', 'AdminController@logout')->name('logout');
    Route::get('/dashboard', 'AdminController@show')->name('dashboard');

// category
    Route::group([

        'prefix' => 'categories',
        'as' => 'categories.',

    ], function () {

        Route::get('/', 'AdminCategoryController@index')->name('index');

        Route::get('/create', 'AdminCategoryController@create')->name('create');

        Route::post('/store', 'AdminCategoryController@store')->name('store');

        Route::get('/edit/{id}', 'AdminCategoryController@edit')->name('edit');

        Route::post('/update/{id}', 'AdminCategoryController@update')->name('update');

        Route::get('/{action}/{id}', 'AdminCategoryController@action')->name('action');

    });

// product
    Route::group([

        'prefix' => 'products',
        'as' => 'products.',

    ], function () {

        Route::get('/', 'AdminProductController@index')->name('index');

        Route::get('/create', 'AdminProductController@create')->name('create');

        Route::post('/store', 'AdminProductController@store')->name('store');

        Route::get('/edit/{id}', 'AdminProductController@edit')->name('edit');

        Route::post('/update/{id}', 'AdminProductController@update')->name('update');

        Route::get('/{action}/{id}', 'AdminProductController@action')->name('action');

    });

    // article
    Route::group([

        'prefix' => 'articles',
        'as' => 'articles.',

    ], function () {

        Route::get('/', 'AdminArticleController@index')->name('index');

        Route::get('/create', 'AdminArticleController@create')->name('create');

        Route::post('/store', 'AdminArticleController@store')->name('store');

        Route::get('/edit/{id}', 'AdminArticleController@edit')->name('edit');

        Route::post('/update/{id}', 'AdminArticleController@update')->name('update');

        Route::get('/{action}/{id}', 'AdminArticleController@action')->name('action');

    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
