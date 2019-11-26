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

/*
    GET /posts (index - list all posts)
    GET /posts/create (create - show form)
    GET /posts/1 (show - show single post)
    POST /posts (store - store post in database)
    GET /posts/1/edit (edit - show edit form)
    PATCH /posts/1 (update - udpate post in database)
    DELETE /posts/1 (destroy - delete post from database)
*/

Route::redirect('zaplecze', '/zaplecze');

// Authentication Routes...
Route::get('gsm-admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('gsm-admin', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'PagesController@index');
Route::get('/aktualnosci', 'PagesController@news');
Route::get('/nasze-sklepy', 'PagesController@shops');
Route::get('/sprzedaj-smartfona', 'PagesController@trade');
Route::get('/galeria', 'PagesController@gallery');
Route::get('/serwis', 'PagesController@service');
Route::get('/kariera', 'PagesController@career');
Route::get('/kontakt', 'PagesController@contact');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'PostController@index');
Route::post('/posts', 'PostController@store');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('edit_post');
Route::patch('/posts/{post}', 'PostController@update');
Route::delete('/posts/{post}', 'PostController@destroy');

Route::get('/shops', 'ShopController@index');
Route::post('/shops', 'ShopController@store');
Route::get('/shops/create', 'ShopController@create');
Route::get('/shops/{shop}/edit', 'ShopController@edit')->name('edit_shop');
Route::patch('/shops/{shop}', 'ShopController@update');
Route::delete('/shops/{shop}', 'ShopController@destroy');

Route::get('/gallery', 'GalleryController@index');
Route::get('/gallery/{folder}', 'GalleryController@show')->name('album');

Route::post('/img', 'ImageController@store');
Route::delete('/img/{folder}/{image}', 'ImageController@destroy');

Route::post('/contact', 'ContactController@make');