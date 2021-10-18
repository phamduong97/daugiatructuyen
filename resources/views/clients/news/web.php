<?php

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

Route::get('/','Clients\HomeController@home')->name('home');
Route::get('/dang-ly-tai-khoan','Clients\UserController@signup')->name('signup');
Route::get('/lien-he','Clients\HomeController@contact')->name('contact');
Route::get('/tin-tuc','Clients\HomeController@news')->name('news');
Route::get('/tin-tuc/chi-tiet','Clients\HomeController@detailnews')->name('detail-news');
Route::get('/gioi-thieu','Clients\HomeController@introduce')->name('introduce');
Route::get('/tai-san','Clients\ProductsController@home')->name('all-products');
Route::get('/tai-san/xem-chi-tiet','Clients\ProductsController@detail')->name('view-detail-product');