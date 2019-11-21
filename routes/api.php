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

Route::post('/sendScenario', 'ScenarioController@createScenario');
Route::post('/sendScenarioValidation', 'ScenarioController@handleScenarioValidation');

Route::post('/updateScenario', 'ScenarioController@updateScenario');

Route::get('/getSequence', 'SequenceController@getSequence');
Route::post('/sendSequenceValidation', 'SequenceController@handleSequenceValidation');