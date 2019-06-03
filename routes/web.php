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

Route::get('/forgot-password', ['uses' => 'Web\UserController@forgotPassword', 'as' => 'forgot.password']);
Route::post('/password-change', ['uses' => 'Web\UserController@sendResetLinkEmail', 'as' => 'password.change']);
Route::get('/password-reset-form/{token}', ['uses' => 'Web\UserController@resetPasswordForm', 'as' => 'newpassword.resetform']);
Route::post('/password-reset', ['uses' => 'Web\UserController@resetPassword', 'as' => 'newpassword.reset']);


Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group( function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('information', ['uses' => 'Web\InformationController@index', 'as' => 'information.index']);
    Route::get('search-information', ['uses' => 'Web\InformationController@searchInformation', 'as' => 'information.search']);
    Route::get('information-chart', ['uses' => 'Web\InformationController@informationChart', 'as' => 'chart.info']);
    Route::get('purpose-chart', ['uses' => 'Web\InformationController@purposeChart', 'as' => 'chart.purpose']);


    Route::group(['middleware' => ['checkpoint']], function () {

        //Information
        Route::get('create-information', ['uses' => 'Web\InformationController@create', 'as' => 'information.create']);
        Route::post('add-information', ['uses' => 'Web\InformationController@store', 'as' => 'information.store']);
        Route::get('edit-information/{id}', ['uses' => 'Web\InformationController@editInformation', 'as' => 'information.edit']);
        Route::post('update-information/{id}', ['uses' => 'Web\InformationController@updateInformation', 'as' => 'information.update']);

        //Purposes
        Route::get('purpose', ['uses' => 'Web\PurposeController@index', 'as' => 'purpose.index']);
        Route::get('create-purpose', ['uses' => 'Web\PurposeController@create', 'as' => 'purpose.create']);
        Route::post('add-purpose', ['uses' => 'Web\PurposeController@store', 'as' => 'purpose.store']);
        Route::post('delete-purpose/{id}', ['uses' => 'Web\PurposeController@deletePurpose', 'as' => 'purpose.destroy']);


        Route::get('information-by-checkpoint/{id}', 'Web\InformationController@checkpointInformation');
        Route::get('request-index', ['uses' => 'Web\InformationController@editIndex', 'as' => 'request.edit']);
        Route::get('request-sent/{id}', ['uses' => 'Web\InformationController@requestForEdit', 'as' => 'request.sent']);
        Route::get('request-approve/{id}', ['uses' => 'Web\InformationController@requestApprove', 'as' => 'request.approve']);
        Route::get('request-reject/{id}', ['uses' => 'Web\InformationController@requestReject', 'as' => 'request.reject']);




        Route::group(['middleware' => ['admin']], function () {
            //User
            Route::resource('user', 'Web\UserController', ['except' => ['show']]);
            Route::post('add-user', 'Web\UserController@addUser');
            Route::get('make-admin/{id}',['uses' => 'Web\UserController@makeAdmin', 'as' => 'make.admin']);
            Route::get('remove-admin/{id}',['uses' => 'Web\UserController@removeAdmin', 'as' => 'remove.admin']);
            Route::get('enable-user/{id}',['uses' => 'Web\UserController@enableUser', 'as' => 'enable.user']);
            Route::get('disable-user/{id}',['uses' => 'Web\UserController@disableUser', 'as' => 'disable.user']);


            //checkpoint
            Route::get('checkpoint', ['uses' => 'Web\CheckpointController@index', 'as' => 'checkpoint.index']);
            Route::get('create-checkpoint', ['uses' => 'Web\CheckpointController@create', 'as' => 'checkpoint.create']);
            Route::post('add-checkpoint', ['uses' => 'Web\CheckpointController@store', 'as' => 'checkpoint.store']);
            Route::post('delete-checkpoint/{id}', ['uses' => 'Web\CheckpointController@deleteCheckpoint', 'as' => 'checkpoint.destroy']);

        });

        /*  Route::post('add-purpose', 'PurposeController@addPurpose');
          Route::get('purpose', 'PurposeController@index');
          Route::post('add-checkpoint', 'CheckpointController@addCheckpoint');
          Route::get('checkpoint', 'CheckpointController@index');
          Route::post('delete-checkpoint/{id}', 'CheckpointController@deleteCheckpoint');
          Route::get('checkpoint-user', 'CheckpointUserController@index');
      });*/
    });

});

