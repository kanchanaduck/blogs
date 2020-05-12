<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('articles', 'Api\ArticleController');
Route::apiResource('authors', 'Api\AuthorController');
Route::apiResource('comments', 'Api\CommentController');

/*
|--------------------------------------------------------------------------
| Notes
|--------------------------------------------------------------------------
|
| You can check the various output cases of this API (with or without comments)
| by going to different indexes of the routes. The random data is generated
| through factories in database/seeds/DatabaseSeeder.php
|
| Run: php artisan db:seed
|
*/

Route::get(
    'articles/{article}/relationships/author',
    [
        'uses' => 'Api\ArticleRelationshipController@author',
        'as' => 'articles.relationships.author',
    ]
);
Route::get(
    'articles/{article}/author',
    [
        'uses' => 'Api\ArticleRelationshipController@author',
        'as' => 'articles.author',
    ]
);
Route::get(
    'articles/{article}/relationships/comments',
    [
        'uses' => 'Api\ArticleRelationshipController@comments',
        'as' => 'articles.relationships.comments',
    ]
);
Route::get(
    'articles/{article}/comments',
    [
        'uses' => 'Api\ArticleRelationshipController@comments',
        'as' => 'articles.comments',
    ]
);
