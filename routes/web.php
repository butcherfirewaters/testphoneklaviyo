<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::post('/sendToKlavio', 'MainController@sendToKlavio')->name('admin.sendToKlavio');
    Route::resource('contacts', 'ContactController');
});

Route::get('register', 'UserController@create')->name('register.create');
Route::post('register', 'UserController@store')->name('register.store');
Route::get('login', 'UserController@loginForm')->name('login.create');
Route::post('login', 'UserController@login')->name('login');
Route::get('logout', 'UserController@logout')->name('logout');