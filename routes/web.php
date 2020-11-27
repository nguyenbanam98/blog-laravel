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

Route::group([
    'namespace' => 'Auth',

], function () {
    // Route::get('/dang-ky', 'RegisterController@getRegister')->name('get.register');
    Route::post('/dang-ky', 'RegisterController@postRegister')->name('post.register');

    Route::get('/dang-nhap', 'LoginController@getLogin')->name('get.login');
    Route::post('/dang-nhap', 'LoginController@postLogin')->name('post.login');

    Route::get('dang-xuat', 'LoginController@getLogout')->name('get.logout');

});

// home
Route::get('/', 'HomeController@index');

Route::get('/trang-chu', 'HomeController@index')->name('trang.chu');

// category
Route::get('/danh-muc-san-pham/{id}', 'CategoryController@showCategoryHome')->name('get.category.index');

// brand
Route::get('/thuong-hieu/{id}', 'BrandController@showBrandHome')->name('get.brand.index');

// product
Route::get('/san-pham/{id}', 'ProductController@productDetail')->name('get.product.detail');

// Cart

Route::post('/save-cart', 'CartController@saveCart')->name('save.cart');
Route::get('/show-cart', 'CartController@show')->name('show.cart');
Route::get('/delete/{id}', 'CartController@delete')->name('delete.cart');
Route::post('/update-qty/{id}', 'CartController@updateQty')->name('update.qty');

// Check Out
Route::get('/checkout', 'CheckoutController@checkout')->middleware('check.login')->name('login.checkout');

// Route::group([
//     'middleware' => 'atuh',
// ], function () {

// });

/*
|--------------------------------------------------------------------------
| Back end
|--------------------------------------------------------------------------

 */
Route::group([

    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',

], function () {

    Route::get('/', 'AdminController@index')->name('index');
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
    // brand

    Route::group([

        'prefix' => 'brands',
        'as' => 'brands.',

    ], function () {

        Route::get('/', 'AdminBrandController@index')->name('index');

        Route::get('/create', 'AdminBrandController@create')->name('create');

        Route::post('/store', 'AdminBrandController@store')->name('store');

        Route::get('/edit/{id}', 'AdminBrandController@edit')->name('edit');

        Route::post('/update/{id}', 'AdminBrandController@update')->name('update');

        Route::get('/{action}/{id}', 'AdminBrandController@action')->name('action');

    });
});
