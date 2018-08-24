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

// Route::get('/admin/new_groups/detail/{id}', 'AdminNewGroupsController@getDetail');
Route::get('/admin/new_groups/booking/{groups_id}', 'AdminNewGroupsController@getBooking');
Route::get('/admin/new_groups/trainees/{groups_id}', 'AdminNewGroupsController@getGroupTrainees');
Route::post('/admin/new_groups/add_trainees', 'AdminNewGroupsController@addGroupTrainees');
Route::get('/admin/new_groups/delete_trainees/{groups_id}/{trainees_id}', 'AdminNewGroupsController@deleteGroupTrainees');
Route::get('/admin/register_fees/pay/{groups_id}/{trainees_id}', 'AdminNewGroupsController@payRegisterFeesTrainees');
Route::get('/admin/certificates_fees/pay/{groups_id}/{trainees_id}', 'AdminNewGroupsController@payCertificatesFeesTrainees');
Route::get('/admin/groups_fees/pay/{groups_id}/{trainees_id}', 'AdminNewGroupsController@getGroupsFeesTrainees');
Route::post('/admin/groups_fees/pay', 'AdminNewGroupsController@payGroupsFeesTrainees');

// Convert
Route::get('/admin/convert_groups_trainees/{groups_id}/{trainees_id}', 'AdminNewGroupsController@getConvertGroupsTrainees');
Route::post('/admin/convert_groups_trainees/', 'AdminNewGroupsController@ConvertGroupsTrainees');

// Receipt
Route::get('/admin/receipt/register_fees/{groups_id}/{trainees_id}/', 'Receipt@registerFees');
Route::get('/admin/receipt/groups_fees/{groups_id}/{trainees_id}/', 'Receipt@groupFees');
Route::get('/admin/receipt/certificate_fees/{groups_id}/{trainees_id}/', 'Receipt@certificateFees');

// attendances
Route::get('admin/attendances/taking_attendance/{attendances_id}/{lectures_id}','AdminAttendancesController@taking_attendance');
Route::get('admin/attendances/lectures/{id}','AdminAttendancesController@getLectures');
Route::post('admin/attendances/add_attendance','AdminAttendancesController@add_attendance');
Route::get('admin/attendances/lecturesReport/{id}','AdminAttendancesController@lecturesReport');

// Results
Route::get('admin/results/details/{id}','AdminResultsController@getDetails');
Route::post('admin/results/details','AdminResultsController@saveDetails');
Route::post('admin/results/finished','AdminResultsController@finished');
Route::post('admin/results/finished','AdminResultController@finished');
// test
Route::get('/', function () {
    return view('welcome');
});
// مبالغة الشغل دا.
