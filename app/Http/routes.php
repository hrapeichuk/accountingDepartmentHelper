<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/hr', 'HRDepartmentController@index');

Route::any('/hr/edit/{id}', 'HRDepartmentController@edit');

Route::get('/hr/delete-user/{id}', 'HRDepartmentController@deleteUser');

Route::any('/hr/job-positions', 'HRDepartmentController@displayJobPositions');

Route::any('/hr/add-job-positions', 'HRDepartmentController@addJobPosition');

Route::any('/hr/edit-job-position/{id}', 'HRDepartmentController@editJobPosition');

Route::get('/hr/delete-job-position/{id}', 'HRDepartmentController@deleteJobPosition');

Route::get('/financial-resources', 'FinancialResourcesDepartmentController@index');

Route::any('/financial-resources/add-account', 'FinancialResourcesDepartmentController@addAccount');

Route::get('/financial-resources/delete-account/{id}', 'FinancialResourcesDepartmentController@deleteAccount');

Route::any('/financial-resources/add-transaction', 'FinancialResourcesDepartmentController@addTransaction');