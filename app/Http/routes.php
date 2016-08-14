<?php

Route::group(['middlewareGroups' => ['web']], function () {


    ## PUBLIC ROUTES ##

    Route::get('/', function () {
        return redirect('/articles');
    });

    // List Articles
    Route::get('/articles',                 'Article\ArticleController@index');

    // Display Single Article
    Route::get('/article/{article}',        'Article\ArticleController@display');


    ## AUTHENTICATION ROUTES ##

    Route::auth();



    ## ADMIN ROUTES ##

    // Defaults
    Route::get('/home',                     'HomeController@index');
    Route::get('/admin',                    'HomeController@index');

    // List Articles
    Route::get('/admin/articles',           'Admin\ArticleController@index');

    // Get Article Create Form
    Route::get('/admin/article',            'Admin\ArticleController@create');

    // Create new article
    Route::post('/admin/article',           'Admin\ArticleController@store');

    // Get Article Edit Form
    Route::get('/admin/article/{article}',  'Admin\ArticleController@edit');

    // Edit Existing Article
    Route::post('/admin/article/{id}',      'Admin\ArticleController@store');

    // Delete Existing Article
    Route::delete('/admin/article/{article}', 'Admin\ArticleController@delete');



    // Get User Create Form
    Route::get('/admin/user',               'Admin\UserController@create');

    // Create New User
    Route::post('/admin/user',              'Admin\UserController@store');

    // Get User Edit Form
    Route::get('/admin/user/{user}',        'Admin\UserController@edit');

    // Edit Existing User
    Route::post('/admin/user/{id}',         'Admin\UserController@store');

    // Delete Existing User
    Route::delete('/admin/user/{user}',     'Admin\UserController@delete');


});



