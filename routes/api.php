<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', 'Api\PostController@index');
Route::get('/posts/all', 'Api\PostController@allPosts');
Route::get('/shops', 'Api\ShopController@index');
Route::get('/shops/all', 'Api\ShopController@allShops');
Route::get('/parts', 'Api\PartController@index');
Route::get('/parts/all', 'Api\PartController@allParts');
Route::get('/gallery/main', 'Api\GalleryController@index');
Route::get('/gallery', 'Api\GalleryController@city');