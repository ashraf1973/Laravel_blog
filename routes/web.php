<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

Route::get('/', 'WelcomeController@index');
Route::get('/portfolio', 'WelcomeController@portfolio');
Route::get('/services', 'WelcomeController@services');
Route::get('/contact', 'WelcomeController@contact');
Route::get('/blog-details/{id}', 'WelcomeController@blog_details');

/*
 * Admin start
 */
Route::get('/admin-panel', 'AdminController@index');
Route::post('/admin-login-check', 'AdminController@admin_login_check');
/*
 * start superAdmin
 */
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/add-category', 'SuperAdminController@add_category');
Route::post('/save-category', 'SuperAdminController@save_category');
Route::get('/manage-category', 'SuperAdminController@manage_category');
Route::get('/unpublished-category/{id}', 'SuperAdminController@unpublished_category');
Route::get('/published-category/{id}', 'SuperAdminController@published_category');
Route::get('/delete-category/{id}', 'SuperAdminController@delete_category');
Route::get('/edit-category/{id}', 'SuperAdminController@edit_category');
Route::post('/update-category/', 'SuperAdminController@update_category');
Route::get('/add-blog', 'SuperAdminController@add_blog');
Route::post('/save-blog', 'SuperAdminController@save_blog');
Route::get('/manage-blog', 'SuperAdminController@manage_blog');
Route::get('/logout', 'SuperAdminController@logout');

/*
 * Admin end
 */




Auth::routes();

Route::get('/home', 'HomeController@index');
