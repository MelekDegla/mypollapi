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

Route::middleware(['auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});

//polls routes
Route::get('/polls',"PollsController@index");
Route::get('/poll/{id}',"PollsController@findbyid");
Route::post('/poll',"PollsController@save");
route::put('/poll/{id}',"pollsController@update");

