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

Route::post('/student/save', 'Api\StudentController@store');

Route::get('/student', 'Api\StudentController@show');

Route::get('/student/{id}', 'Api\StudentController@showById');

Route::put('/student/update/{id}', 'Api\StudentController@update');

Route::delete('/student/delete/{id}', 'Api\StudentController@delete');
