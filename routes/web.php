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
Route::get('/',['as'=>'home.index','uses'=>'HomeController@index']);
Route::get('/home',['as'=>'home.index','uses'=>'HomeController@index']);

Route::get('datatable/getposts', ['as'=>'datatable.getposts','uses'=>'HomeController@getPosts']);
/*
 * ajax
 */
Route::GET('getInterviewCode',['as'=>'getInterviewCode','uses'=>'HomeController@getInterviewCode']);
Route::GET('getHealthFacilitiesCode',['as'=>'getHealthFacilitiesCode','uses'=>'HomeController@getHealthFacilitiesCode']);
Route::GET('getdata',['as'=>'getdata','uses'=>'HomeController@getdatacode']);

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


/*
* Report
*/
Route::GET('generateReportByMonth',['as'=>'generateReportByMonth','uses'=>'ReportController@generateReportByMonth']);
Route::get('printinterviewresult/{id}',['as'=>'printInterviewResult.print','uses'=>'ReportController@pirntInterviewResult']);


Route::group(['prefix' => 'home','middleware' => ['auth']], function() {
    /* role and set permission*/
    Route::GET('role.html',['as'=>'role.index','uses'=>'RoleController@index','middleware' => ['permission:role-list']]);
    Route::GET('role/create.html',['as'=>'role.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::POST('role/store.html',['as'=>'role.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
    Route::GET('role/edit/{id}',['as'=>'role.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
    Route::POST('role/update/{id}',['as'=>'role.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
    Route::GET('role/delete/{id}',['as'=>'role.delete','uses'=>'RoleController@delete','middleware' => ['permission:role-delete']]);


    /*users*/
    Route::GET('user.html',['as'=>'user.index','uses'=>'UserController@index','middleware' => ['permission:user-list']]);
    Route::GET('user/view.html',['as'=>'user.getUserView','uses'=>'UserController@getUserView']);
    Route::GET('user/create.html',['as'=>'user.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
    Route::POST('user/store.html',['as'=>'user.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);
    Route::GET('user/edit/{id}',['as'=>'user.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
    Route::POST('user/updated/{id}',['as'=>'user.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
    Route::GET('user/delete/{id}',['as'=>'user.delete','uses'=>'UserController@delete','middleware' => ['permission:user-delete']]);


});