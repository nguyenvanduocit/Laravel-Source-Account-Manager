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

/** \Illuminate\Support\Facades\Route Route */
Route::group(['middleware' => 'web'], function () {

    // Authentication Routes...
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    Route::get('/', 'HomeController@index');
    Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
});

Route::group(['middleware' => ['web','auth']], function() {
    Route::controller('account', 'AccountController',[
        'getCreate' => 'account.create',
        'getMyGames'=>'account.mygames',
        'postStore' =>'account.store',
        'getShow' =>'account.show',
        'getEdit'=>'account.edit',
        'patchUpdate'=>'account.update',
        'getPassword'=>'account.getPassword',
        'postPassword'=>'account.postPassword',
    ]);
    Route::resource('user', 'UserController');
    Route::resource('server', 'ServerController');
    Route::controller('game', 'GameController',[
        'getIndex' => 'game.index',
        'getShow' => 'game.show'
    ]);
});

Route::group(['prefix' => 'admin','namespace' => 'Admin', 'middleware' => ['web','auth','role:moderator']], function() {

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::group(['middleware' => ['role:account_manager|administrator']], function() {
        Route::resource('account', 'AccountController');
        Route::post('account/restore/{accountId}', 'AccountController@postRestore')->name('admin.account.restore');
    });

    Route::group(['middleware' => ['role:game_manager|administrator']], function() {
        Route::resource('game', 'GameController');
        Route::resource('server', 'ServerController');
    });

    Route::group(['middleware' => ['role:administrator']], function() {
        Route::resource('role', 'RoleController');
        Route::resource('user', 'UserController');
        Route::resource('permission', 'PermissionController');
    });
});