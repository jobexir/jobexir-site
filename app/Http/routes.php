<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    
    Route::get('/', function () {
       return view('welcome');
    });
    Route::get('contact/import/google', ['as'=>'goole.import', 'uses'=>'ContactController@importGoogleContact'])->middleware('auth');
    Route::get('contact/import/sendInvitationEmail','InvitationController@sendInvitation')->middleware('auth');
    Route::auth();
    Route::get('info',function(){
       $userinfo=App\User::find(\Auth::user()->id);

        return view('info',compact('userinfo'));
    })->middleware('auth');

        Route::get('/share', function() {
            return Share::load('http://www.jobexir.com', 'JobExir!')->gplus();
        });
    Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
    Route::get('/home', 'HomeController@index');
});
