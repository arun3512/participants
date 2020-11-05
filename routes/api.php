<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ParticipantController;
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

//Route::get('index', 'API\ParticipantController@index');
Route::get('participants/index', 'App\Http\Controllers\API\ParticipantController@index');
Route::post('participants/add', 'App\Http\Controllers\API\ParticipantController@addParticipant');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
