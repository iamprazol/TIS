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

Route::get('/', ['uses' => 'Web\AboutUsController@home', 'as' => 'home']);
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
    Route::get('entry-information', ['uses' => 'Web\InformationController@index', 'as' => 'information.index']);
    Route::get('exit-information', ['uses' => 'Web\ExitInfoController@index', 'as' => 'exitinfo.index']);
    Route::get('search-entry-information', ['uses' => 'Web\InformationController@searchInformation', 'as' => 'information.search']);
    Route::get('search-exit-information', ['uses' => 'Web\ExitInfoController@searchInformation', 'as' => 'exit.search']);
    Route::get('information-chart', ['uses' => 'Web\InformationController@informationChart', 'as' => 'chart.info']);
    Route::get('purpose-chart', ['uses' => 'Web\InformationController@purposeChart', 'as' => 'chart.purpose']);


    Route::group(['middleware' => ['checkpoint']], function () {

        Route::get('markAsRead', ['uses' => 'Web\InformationController@markAsRead', 'as' => 'markasread']);

        //Information
        Route::get('create-entry-information', ['uses' => 'Web\InformationController@create', 'as' => 'information.create']);
        Route::get('create-exit-information', ['uses' => 'Web\ExitInfoController@create', 'as' => 'exit.create']);
        Route::post('add-entry-information', ['uses' => 'Web\InformationController@store', 'as' => 'information.store']);
        Route::post('add-exit-information', ['uses' => 'Web\ExitInfoController@store', 'as' => 'exit.store']);
        Route::get('delete-exit-information/{id}', ['uses' => 'Web\ExitInfoController@delete', 'as' => 'exit.delete']);
        Route::get('edit-information/{id}', ['uses' => 'Web\InformationController@editInformation', 'as' => 'information.edit']);
        Route::post('update-information/{id}', ['uses' => 'Web\InformationController@updateInformation', 'as' => 'information.update']);

        //Purposes
        Route::get('purpose', ['uses' => 'Web\PurposeController@index', 'as' => 'purpose.index']);
        Route::get('create-purpose', ['uses' => 'Web\PurposeController@create', 'as' => 'purpose.create']);
        Route::post('add-purpose', ['uses' => 'Web\PurposeController@store', 'as' => 'purpose.store']);
        Route::get('edit-purpose/{id}', ['uses' => 'Web\PurposeController@edit', 'as' => 'purpose.edit']);
        Route::post('update-purpose/{id}', ['uses' => 'Web\PurposeController@update', 'as' => 'purpose.update']);



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
            Route::post('delete-purpose/{id}', ['uses' => 'Web\PurposeController@deletePurpose', 'as' => 'purpose.destroy']);


            //checkpoint
            Route::get('checkpoint', ['uses' => 'Web\CheckpointController@index', 'as' => 'checkpoint.index']);
            Route::get('create-checkpoint', ['uses' => 'Web\CheckpointController@create', 'as' => 'checkpoint.create']);
            Route::post('add-checkpoint', ['uses' => 'Web\CheckpointController@store', 'as' => 'checkpoint.store']);
            Route::get('edit-checkpoint/{id}', ['uses' => 'Web\CheckpointController@edit', 'as' => 'checkpoint.edit']);
            Route::post('update-checkpoint/{id}', ['uses' => 'Web\CheckpointController@update', 'as' => 'checkpoint.update']);
            Route::post('delete-checkpoint/{id}', ['uses' => 'Web\CheckpointController@deleteCheckpoint', 'as' => 'checkpoint.destroy']);

            Route::get('validate', ['uses' => 'Web\ExitInfoController@valid', 'as' => 'info.validate']);
            Route::get('check-validation', ['uses' => 'Web\ExitInfoController@validateInfo', 'as' => 'check.validation']);
            Route::get('about-us', ['uses' => 'Web\AboutUsController@index', 'as' => 'aboutus']);
            Route::get('contact-us', ['uses' => 'Web\AboutUsController@contact', 'as' => 'contactus']);
            Route::post('about-us-update/{id}', ['uses' => 'Web\AboutUsController@update', 'as' => 'aboutus.update']);
            Route::post('contact-us-update/{id}', ['uses' => 'Web\AboutUsController@contactUpdate', 'as' => 'contactus.update']);


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

