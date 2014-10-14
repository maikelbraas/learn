<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'HomeController@showWelcome', 'as' => 'home'));
Route::get('/pages/{title}', array('uses' => 'PageController@getPage', 'as' => 'getPage'));
Route::get('/page/project', array('uses' => 'PageController@getProject', 'as' => 'getProject'));

Route::group(array('before' => 'guest'), function()
{
    Route::get('/user/login', array('uses' => 'UserController@getLogin', 'as' => 'getLogin'));
    Route::get('/user/create', array('uses' => 'UserController@getCreate', 'as' => 'getCreate'));

    Route::group(array('before' => 'csrf'), function()
    {
        Route::post('/user/post/login', array('uses' => 'UserController@postLogin', 'as' => 'postLogin'));
        Route::post('/user/post/create', array('uses' => 'UserController@postCreate', 'as' => 'postCreate'));
    });
});

Route::group(array('before' => 'auth'), function()
{
    Route::get('/user/logout', array('uses' => 'UserController@getLogout', 'as' => 'getLogout'));
    Route::get('/page/blog', array('uses' => 'BlogController@getBlog', 'as' => 'getBlog'));

    Route::group(array('before' => 'csrf'), function()
    {
        Route::post('/page/post/blog', array('uses' => 'BlogController@postBlog', 'as' => 'postBlog'));
    });

    Route::group(array('before' => 'admin'), function() {
        Route::get('/page/newpage', array('uses' => 'PageController@getNewpage', 'as' => 'getNewpage'));

        Route::group(array('before' => 'csrf'), function()
        {
            Route::post('/page/post/newpage', array('uses' => 'PageController@postNewpage', 'as' => 'postNewpage'));
        });
    });
});