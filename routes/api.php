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

Route::namespace('Api')->group(function () {
    Route::get('/questions','QuestionController@create');
    Route::post('/questions','QuestionController@store');
    Route::delete('/questions/{id}','QuestionController@destroy');
    Route::put('/questions/{id}','QuestionController@update');
    Route::get('/questions/{id}','QuestionController@show');

    Route::get('/categories','CategoryController@index');
});
