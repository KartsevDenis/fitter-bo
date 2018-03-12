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

Route::get('/', 'HomeController@index')->name('main');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('main');

Route::get('/post/{id}', 'PostController@index')->name('show_post');

/* === ADMIN === */

//Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/admin', 'Admin\DashboardController@index');
    /*user*/
    Route::get('/admin/user', 'Admin\UserController@index');
    Route::get('/admin/user/add', 'Admin\UserController@add_user')->name('add_user');
    Route::get('/admin/user/edit/{id}', 'Admin\UserController@edit_user')->name('edit_user');
    Route::post('/admin/user/delete', 'Admin\UserController@delete_user')->name('delete_user');
    Route::post('/admin/user/save', 'Admin\UserController@save_user')->name('save_user');
    Route::get('/admin/users', 'Admin\UserController@users')->name('users');
// });

