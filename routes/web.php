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
Route::get('/',['as'=>'home','uses'=>'HomeController@index'])->name('home');
Route::get('/home',['as'=>'home','uses'=>'HomeController@index'])->name('home');


Route::GET('getInterviewCode',['as'=>'getInterviewCode','uses'=>'HomeController@getInterviewCode']);
Route::GET('getDistrict',['as'=>'getDistrict','uses'=>'HomeController@getDistrict']);
Route::GET('getCommune',['as'=>'getCommune','uses'=>'HomeController@getCommune']);
Route::GET('getVillage',['as'=>'getVillage','uses'=>'HomeController@getVillage']);


Route::POST('insert',['as'=>'insert.index','uses'=>'HomeController@insert']);
Route::GET('data-view/{id}',['as'=>'view.data','uses'=>'HomeController@view']);
Route::GET('data-printing/{id}',['as'=>'print.data','uses'=>'HomeController@print']);


Route::GET('editpatient/{id}',['as'=>'editpatient.edit','uses'=>'HomeController@edit']);