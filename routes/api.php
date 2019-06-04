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
Route::post('login', 'Api\UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('logout', 'Api\UserController@logout');
    Route::get('my-profile', 'Api\UserController@getAuthenticatedUser');
    Route::put('profile-edit', 'Api\UserController@update');
    Route::get('information', 'Api\InformationController@index');
    Route::get('search-information', 'Api\InformationController@search');

    Route::middleware(['apicheckpoint'])->prefix('checkpoint')->group( function () {
        Route::post('logout', 'UserController@logout');
        Route::get('my-profile', 'Api\UserController@getAuthenticatedUser');
        Route::put('profile-edit', 'Api\UserController@update');
        Route::get('information', 'Api\InformationController@index');
        Route::get('search-information', 'Api\InformationController@search');

        Route::post('add-information', 'Api\InformationController@addInformation');
        Route::put('edit-information/{id}', 'Api\InformationController@editInformation');
        Route::post('add-purpose', 'Api\PurposeController@addPurpose');
        Route::get('purpose', 'Api\PurposeController@index');
        Route::post('delete-purpose/{id}', 'Api\PurposeController@deletePurpose');

        Route::get('countries', 'Api\CountryController@index');
        Route::get('request-sent/{id}', 'Api\InformationController@requestForEdit');
        Route::get('my-request-list', 'Api\InformationController@myRequestIndex');

    });

    Route::middleware(['apiadmin'])->prefix('admin')->group( function () {
        Route::post('logout', 'UserController@logout');
        Route::get('my-profile', 'Api\UserController@getAuthenticatedUser');
        Route::put('profile-edit', 'Api\UserController@update');
        Route::get('information', 'Api\InformationController@index');
        Route::get('search-information', 'Api\InformationController@search');

        Route::get('countries', 'Api\CountryController@index');

        Route::post('add-purpose', 'Api\PurposeController@addPurpose');
        Route::get('purpose', 'Api\PurposeController@index');
        Route::post('delete-purpose/{id}', 'Api\PurposeController@deletePurpose');

        Route::post('add-checkpoint', 'Api\CheckpointController@addCheckpoint');
        Route::get('checkpoints', 'Api\CheckpointController@index');
        Route::post('delete-checkpoint/{id}', 'Api\CheckpointController@deleteCheckpoint');

        Route::post('add-user', 'Api\UserController@addUser');
        Route::get('users', 'Api\UserController@userList');
        Route::post('make-admin/{id}', 'Api\UserController@makeAdmin');
        Route::post('remove-admin/{id}', 'Api\UserController@removeAdmin');
        Route::post('enable-user/{id}', 'Api\UserController@enableUser');
        Route::post('disable-user/{id}', 'Api\UserController@disableUser');

        Route::post('add-information', 'Api\InformationController@addInformation');
        Route::put('edit-information/{id}', 'Api\InformationController@editInformation');
        Route::get('request-approve/{id}', 'Api\InformationController@requestApprove');
        Route::get('request-reject/{id}', 'Api\InformationController@requestReject');
        Route::get('request-list', 'Api\InformationController@requestIndex');
    });
});
