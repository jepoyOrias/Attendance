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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'DashboardController@show');

Route::view('/department', 'department/department');
Route::view('/employee', 'employee/employee');

/* Attendance time-in time-out*/
Route::post('/home/time_in','HomeController@store');
Route::post('/home/time_out','HomeController@update');


/* Attendance intern*/
Route::post('/interns','InternController@store');



/* departments */
Route::get('/department', 'DepartmentController@show');
Route::post('/department','DepartmentController@store');


/*intern*/

Route::post('/intern','InternController@store');
Route::get('/intern', 'InternController@show');
Route::get('/show/{id}','InternController@show_dtr');


/*intern*/

Route::post('/employee','EmployeeConrtoller@store');
Route::get('/employee', 'EmployeeConrtoller@show');




/*intern edit*/
Route::get('/intern{id}','InternEditController@view');
Route::post('/intern{id}','InternEditController@update');


Route::get('/restore','InternEditController@restoredata');
Route::get('passdata{id}','InternEditController@passingdata');
Route::get('/dest{id}','InternEditController@destroy');


