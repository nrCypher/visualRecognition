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

Route::get('/', 'ScenarioController@init')->name('init');
Route::get('/home', 'ScenarioController@index')->name('home');
Route::get('/sequence', 'SequenceController@index')->name('homeSequence');

Route::get('/checkScenario', 'ScenarioController@checkScenario');
Route::post('/setScenarioStatus', 'ScenarioController@setScenarioStatus');

Route::get('/checkSequence', 'SequenceController@checkSequence');
