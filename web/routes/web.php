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
    return view('/auth/login');
});

Auth::routes();

Route::get('/settings', 'Settings\SettingsController@index')->name('/settings');
Route::post('/settings/update/all', 'Settings\SettingsController@update');
/*Route::post('/settings/update/username', 'Settings\SettingsController@updateUsername');
Route::post('/settings/update/email', 'Settings\SettingsController@updateEmail');
Route::post('/settings/update/password', 'Settings\SettingsController@updatePassword');*/

Route::get('/dashboard', 'Database\DatabaseController@index')->name('/dashboard');
Route::get('/database', 'Database\DatabaseController@newDb')->name('/database');
Route::post('/database/new/', 'Database\DatabaseController@publish')->name('/database/new');
Route::post('/database/sync/all', 'Database\DatabaseController@syncAll')->name('/database/sync/all');
Route::get('/database/delete/{database}', 'Database\DatabaseController@delete');

Route::model('database', 'App\Database');