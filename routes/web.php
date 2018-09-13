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
Route::group(['prefix' => 'ajax/','middleware' => ['auth']], function() {
    Route::GET('getInterviewCode',['as'=>'getInterviewCode','uses'=>'AjaxController@getInterviewCode']);
    Route::GET('getHealthFacilitiesCode',['as'=>'getHealthFacilitiesCode','uses'=>'AjaxController@getHealthFacilitiesCode']);
    Route::GET('getdata',['as'=>'getdata','uses'=>'AjaxController@getdatacode']);

    Route::GET('getDistrict',['as'=>'getDistrict','uses'=>'AjaxController@getDistrict']);
    Route::GET('getCommune',['as'=>'getCommune','uses'=>'AjaxController@getCommune']);
    Route::GET('getVillage',['as'=>'getVillage','uses'=>'AjaxController@getVillage']);
    Route::GET('getPrintCardNo',['as'=>'getPrintCardNo','uses'=>'AjaxController@getPrintCardNo']);
   // Route::GET('getPatientView',['as'=>'view.getPatientView','uses'=>'AjaxController@getPatientView']);
});



/*
* Patient
*/
Route::group(['prefix' => 'patient/interview','middleware' => ['auth']], function() {
    Route::POST('/insert',['as'=>'insert.index','uses'=>'HomeController@insert','middleware' => ['permission:post-id-create']]);
    Route::GET('/view/{id}',['as'=>'view.data','uses'=>'HomeController@view','middleware' => ['permission:post-id-view']]);
    Route::GET('/data-printing/{id}',['as'=>'print.data','uses'=>'HomeController@print','middleware' => ['permission:post-id-print']]);
    Route::GET('/edit/{id}',['as'=>'editpatient.edit','uses'=>'HomeController@edit','middleware' => ['permission:post-id-edit']]);
    Route::POST('/update/{id}',['as'=>'updatepatient.update','uses'=>'HomeController@update','middleware' => ['permission:post-id-edit']]);
    Route::get('/delete/{id}',['as'=>'deletepatient.delete','uses'=>'HomeController@delete','middleware' => ['permission:post-id-delete']]);
});


/*
* Report
*/
Route::group(['prefix' => 'report/','middleware' => ['auth']], function() {
    Route::GET('report.html',['as'=>'report.index','uses'=>'ReportController@index','middleware' => ['permission:generate-report-by-year|generate-report-by-month|generate-report-by-day|generate-report-by-week']]);
    Route::POST('generate/by/year',['as'=>'reportbymonth','uses'=>'ReportController@generateReportByYear','middleware' => ['permission:generate-report-by-year']]);
    Route::get('printinterviewresult/{id}',['as'=>'printInterviewResult.print','uses'=>'ReportController@pirntInterviewResult','middleware' => ['permission:post-id-export']]);
});

Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {
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
    Route::POST('user/upload/{id}',['as'=>'user.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
    Route::GET('user/delete/{id}',['as'=>'user.delete','uses'=>'UserController@delete','middleware' => ['permission:user-delete']]);


});

/*
 *
 * Profile
 */
Route::group(['prefix' => 'profile','middleware' => ['auth']], function() {
    Route::get('/', ['as' => 'profile.index', 'uses' => 'ProfileController@profile']);
    Route::POST('/updated', ['as' => 'profile.update', 'uses' => 'ProfileController@UpdatedProfile']);
});
