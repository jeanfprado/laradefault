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
    return view('welcome');
});

Auth::routes();

/**
 *  Route Permissions
 */
Route::resource('permissions', 'Permission\PermissionController');

/**
 * Route Roles
 */
Route::resource('roles', 'Permission\RoleController');

Route::get('/roles/permissions/{role}', 'Permission\RoleController@showPermission')->name('roles.permission');
Route::post('/roles/permissions/store', 'Permission\RoleController@storePermission')->name('roles.permission.store');

/**
* Route Users
*/
Route::resource('users', 'UserController');

Route::get('/myprofile', ['as' => 'users.profile',  'uses' =>'UserController@profile']);
Route::post('/myprofile/newpassoword', ['as' => 'users.newpassword',  'uses' =>'UserController@newpassword']);
Route::post('/myprofile/update', ['as' => 'users.update',  'uses' =>'UserController@profileUpdate']);

Route::get('/home', 'HomeController@index')->name('home');
