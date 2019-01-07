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

Route::apiResource('/users','api\UserController');
Route::apiResource('/category','api\CategoryController');
Route::apiResource('/subcategory','api\SubCategoryController');
Route::apiResource('/posts','api\PostController');

Route::get('/approved/posts','api\PostController@approved_post');
Route::get('/pending/posts','api\PostController@pending_post');
Route::put('/posts/{id}/approved','api\PostController@approved');

// Frontend Route
Route::get('frontend/category','Frontend\CategoryController@index');
Route::get('frontend/post_by_category/{slug}/{count}','Frontend\PostController@getPostByCategory');
Route::get('frontend/posts/{count}','Frontend\PostController@getPostByCount');

