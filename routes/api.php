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
route::put('/poll/{id}',"PollsController@update");
route::get('/poll/{id}/activate',"PollsController@activate");
route::get('/poll/{id}/full',"PollsController@pollWithAnswers");

route::get('/vote/{id}',"AnswersController@vote");
route::get('/user/{id}',"UserController@getActivated");
route::get('/poll/user/{id}',"PollsController@getPollByUserId");
route::post('/poll/ans',"PollsController@savePollWithAnswers");
route::post('/answer',"AnswersController@save");
route::get('/polls/user/{id}',"PollsController@getPollsByUserId");


