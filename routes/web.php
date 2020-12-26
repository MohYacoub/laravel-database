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

Route::get('/adminlogin', function () {
    return view('login');
});
Route::get('/studentregister', function () {
    return view('register');
});

Route::post('/students','StudentController@store');

Route::get('/students','StudentController@index');
Route::get('/students/{id}','StudentController@show');

Route::post('/admincheck','AdminController@check');
Route::get('/admin','AdminController@index');
Route::get('/admin/delete/{id}','AdminController@destroy');
Route::get('/admin/edit/{id}','AdminController@edit');




Route::post('/admin/edit/{id}','AdminController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


