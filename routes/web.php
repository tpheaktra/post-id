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
Route::get('/',['as'=>'home','uses'=>'HomeController@index'])->name('home');
Route::get('/home',['as'=>'home.index','uses'=>'HomeController@index']);

Route::get('datatable/getposts', ['as'=>'datatable.getposts','uses'=>'HomeController@getPosts']);
/*
 * ajax
 */
Route::GET('getInterviewCode',['as'=>'getInterviewCode','uses'=>'HomeController@getInterviewCode']);
Route::GET('getDistrict',['as'=>'getDistrict','uses'=>'HomeController@getDistrict']);
Route::GET('getCommune',['as'=>'getCommune','uses'=>'HomeController@getCommune']);
Route::GET('getVillage',['as'=>'getVillage','uses'=>'HomeController@getVillage']);

/*
 * insert data
 */
Route::POST('insertpatient',['as'=>'insert.index','uses'=>'HomeController@insert']);
Route::GET('viewpatient/{id}',['as'=>'view.data','uses'=>'HomeController@view']);
Route::GET('getPatientView',['as'=>'view.getPatientView','uses'=>'HomeController@getPatientView']);
Route::GET('data-printing/{id}',['as'=>'print.data','uses'=>'HomeController@print']);
Route::GET('editpatient/{id}',['as'=>'editpatient.edit','uses'=>'HomeController@edit']);
Route::POST('updatepatient/{id}',['as'=>'updatepatient.update','uses'=>'HomeController@update']);
Route::get('deletepatient/{id}',['as'=>'deletepatient.delete','uses'=>'HomeController@delete']);

Route::group(['prefix' => 'home','middleware' => ['auth']], function() {
    /* role and set permission*/
    Route::GET('role',['as'=>'role.index','uses'=>'RoleController@index','middleware' => ['permission:role-list']]);
    Route::GET('role/create',['as'=>'role.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::POST('role/store',['as'=>'role.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
    Route::GET('role/edit/{id}',['as'=>'role.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
    Route::POST('role/update/{id}',['as'=>'role.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
    Route::GET('role/delete/{id}',['as'=>'role.delete','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);


    /*users*/
    Route::GET('user',['as'=>'user.index','uses'=>'UserController@index','middleware' => ['permission:user-list']]);
    Route::GET('user/create',['as'=>'user.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
    Route::POST('user/store',['as'=>'user.store','uses'=>'UserController@store','middleware' => ['permission:user-delete']]);


});