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
    return view('login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/authuser', 'loinController@authuser')->name('authuser');
Route::get('/user-list', 'loinController@userlist')->name('user-list');
Route::get('/add-user', 'loinController@create')->name('add-user');
Route::post('/u-store', 'loinController@store')->name('u-store');
Route::get('/user-role/{id}', 'loinController@userrole')->name('user-role');
Route::post('/role-user-store/{id}', 'loinController@roleuserstore')->name('role-user-store');
Route::get('/logout', 'HomeController@logout')->name('logout');
