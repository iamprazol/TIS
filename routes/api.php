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
Route::post('login', 'UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('add-user', 'UserController@addUser');
    Route::get('my-profile', 'UserController@getAuthenticatedUser');
    Route::put('profile-edit', 'UserController@update');
    Route::post('add-information', 'InformationController@addInformation');
    Route::get('information', 'InformationController@index');
    Route::get('information-by-checkpoint/{id}', 'InformationController@checkpointInformation');
    Route::put('edit-information/{id}', 'InformationController@editInformation');

    Route::post('delete-purpose/{id}', 'PurposeController@deletePurpose');

    Route::group(['middleware' => ['admin']], function () {
       Route::post('add-purpose', 'PurposeController@addPurpose');
       Route::get('purpose', 'PurposeController@index');
       Route::post('add-checkpoint', 'CheckpointController@addCheckpoint');
       Route::get('checkpoint', 'CheckpointController@index');
       Route::post('delete-checkpoint/{id}', 'CheckpointController@deleteCheckpoint');
       Route::get('checkpoint-user', 'CheckpointUserController@index');
    });
});
