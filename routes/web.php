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

// Route::get('/', function () {
//     return view('welcome');
// });


/*
*Website Route
*/
Route::get('/', 'BlogController@index');
Route::get('/about-us', 'BlogController@aboutUs');
Route::get('/contact-us', 'BlogController@contactUs');


/*
*Admin Route
*/
Route::get('/admin-panel', 'AdminController@index');
Route::post('/admin-login-check', 'AdminController@adminLoginCheck');
Route::get('/dashboard', 'SuperAdminController@index');

/*
*Admin Category Route
*/

Route::get('/add-category', 'SuperAdminController@add_category');
Route::post('/save-category', 'SuperAdminController@save_category');
Route::get('/manage-category', 'SuperAdminController@manage_category');
Route::get('/unpublished-category/{id}', 'SuperAdminController@unpublished_category');
Route::get('/published-category/{id}', 'SuperAdminController@published_category');
Route::get('/delete-category/{id}', 'SuperAdminController@delete_category');
Route::get('/edit-category/{id}', 'SuperAdminController@edit_category');
Route::post('/update-category/{id}', 'SuperAdminController@update_category');
Route::get('/archive-category', 'SuperAdminController@archive_category');

/*
*Admin Category Route
*/

Route::get('/add-blog', 'SuperAdminController@add_blog');



Route::get('/logout', 'SuperAdminController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
