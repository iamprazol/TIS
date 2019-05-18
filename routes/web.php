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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

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

