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



Auth::routes();


/* === FITTER === */

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/fit', 'Fitter\DashboardController@index')->name('fit_main');

    Route::get('/fit/posts', 'Fitter\PostController@index')->name('fit_posts');
    Route::get('/fit/post/new', 'Fitter\PostController@new_post')->name('fit_new_post');
    Route::post('/fit/post/insert', 'Fitter\PostController@insert_post')->name('fit_insert_post');
    Route::get('/fit/post/edit/{id}', 'Fitter\PostController@etit_post')->name('fit_edit_post');

    Route::get('/fit/comments', 'Fitter\CommentController@index')->name('fit_comments');
});

/* === ADMIN === */

Route::group(['middleware' => 'auth:web'], function () {
    //Route::get('/admin', 'Admin\DashboardController@index');
    Route::get('/admin/user', 'Admin\UserController@index');
    Route::get('/admin/user/add', 'Admin\UserController@add_user')->name('add_user');
    Route::get('/admin/user/edit/{id}', 'Admin\UserController@edit_user')->name('edit_user');
    Route::post('/admin/user/delete', 'Admin\UserController@delete_user')->name('delete_user');
    Route::post('/admin/user/save', 'Admin\UserController@save_user')->name('save_user');
    Route::get('/admin/users', 'Admin\UserController@users')->name('users');
 });

