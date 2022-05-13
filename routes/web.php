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

Route::get('/', 'HomeController@index')
    ->name('home');

Route::resource('usuarios', 'UserController')
    ->middleware('can:adminUser');

Route::resource('roles', 'RoleController')
    ->middleware('can:adminUser');

Route::resource('files', 'FilesController')
    ->middleware('can:cliente');

Route::get('files', 'FilesController@index')
    ->name('files/index')
    ->middleware('can:cliente');

Route::get('/files-download/{file}', 'FilesController@download')
    ->name('files.download')
    ->middleware('can:cliente');

Route::resource('filesadmin', 'AdminFilesController')
    ->middleware('can:adminFile');

Route::get('filesadmin', 'AdminFilesController@index')
    ->name('filesadmin/index')
    ->middleware('can:adminFile');

Route::get('/filesadmin-download/{file}', 'AdminFilesController@download')
    ->name('filesadmin.download')
    ->middleware('can:adminFile');



