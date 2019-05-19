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
    return view('auth.login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	//Information
    Route::get('information', ['uses' => 'InformationController@index', 'as' => 'information.index']);
    Route::get('create-information', ['uses' => 'InformationController@create', 'as' => 'information.create']);
    Route::post('add-information', ['uses' => 'InformationController@store', 'as' => 'information.store']);
    Route::get('edit-information/{id}', ['uses' => 'InformationController@editInformation', 'as' => 'information.edit']);
    Route::post('update-information/{id}', ['uses' => 'InformationController@updateInformation', 'as' => 'information.update']);

    //Purposes
    Route::get('purpose', ['uses' => 'PurposeController@index', 'as' => 'purpose.index']);
    Route::get('create-purpose', ['uses' => 'PurposeController@create', 'as' => 'purpose.create']);
    Route::post('add-purpose', ['uses' => 'PurposeController@store', 'as' => 'purpose.store']);
    Route::post('delete-purpose/{id}', ['uses' => 'PurposeController@deletePurpose', 'as' => 'purpose.destroy']);



    Route::post('add-user', 'UserController@addUser');
    Route::get('information-by-checkpoint/{id}', 'InformationController@checkpointInformation');


    Route::group(['middleware' => ['admin']], function () {
        //checkpoint
        Route::get('checkpoint', ['uses' => 'CheckpointController@index', 'as' => 'checkpoint.index']);
        Route::get('create-checkpoint', ['uses' => 'CheckpointController@create', 'as' => 'checkpoint.create']);
        Route::post('add-checkpoint', ['uses' => 'CheckpointController@store', 'as' => 'checkpoint.store']);
        Route::post('delete-checkpoint/{id}', ['uses' => 'CheckpointController@deleteCheckpoint', 'as' => 'checkpoint.destroy']);
    });
      /*  Route::post('add-purpose', 'PurposeController@addPurpose');
        Route::get('purpose', 'PurposeController@index');
        Route::post('add-checkpoint', 'CheckpointController@addCheckpoint');
        Route::get('checkpoint', 'CheckpointController@index');
        Route::post('delete-checkpoint/{id}', 'CheckpointController@deleteCheckpoint');
        Route::get('checkpoint-user', 'CheckpointUserController@index');
    });*/
});

