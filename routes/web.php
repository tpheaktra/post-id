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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');



Route::GET('getDistrict',['as'=>'getDistrict','uses'=>'HomeController@getDistrict']);
Route::GET('getCommune',['as'=>'getCommune','uses'=>'HomeController@getCommune']);
Route::GET('getVillage',['as'=>'getVillage','uses'=>'HomeController@getVillage']);


Route::POST('insert',['as'=>'insert.index','uses'=>'HomeController@insert']);
Route::GET('data-view',['as'=>'view.data','uses'=>'HomeController@view']);
