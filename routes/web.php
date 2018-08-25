<?php

/*
|--------------------------------------------------------------------------
| مسارات الويب
|--------------------------------------------------------------------------
|
| هنا حيث يمكنك تسجيل مسارات الويب للتطبيق.
|
*/

// مسارات المجموعات الجديدة
Route::get('/admin/new_groups/booking/{groups_id}', 'AdminNewGroupsController@getBooking');
Route::get('/admin/new_groups/trainees/{groups_id}', 'AdminNewGroupsController@getGroupTrainees');
Route::post('/admin/new_groups/add_trainees', 'AdminNewGroupsController@addGroupTrainees');
Route::get('/admin/new_groups/delete_trainees/{groups_id}/{trainees_id}', 'AdminNewGroupsController@deleteGroupTrainees');

// مسارات دفع رسوم المجموعات
Route::get('/admin/register_fees/pay/{groups_id}/{trainees_id}', 'AdminNewGroupsController@payRegisterFeesTrainees');
Route::get('/admin/certificates_fees/pay/{groups_id}/{trainees_id}', 'AdminNewGroupsController@payCertificatesFeesTrainees');
Route::get('/admin/groups_fees/pay/{groups_id}/{trainees_id}', 'AdminNewGroupsController@getGroupsFeesTrainees');
Route::post('/admin/groups_fees/pay', 'AdminNewGroupsController@payGroupsFeesTrainees');

// مسارات تحويل المتدرب من مجموعة ﻷخرى
Route::get('/admin/convert_groups_trainees/{groups_id}/{trainees_id}', 'AdminNewGroupsController@getConvertGroupsTrainees');
Route::post('/admin/convert_groups_trainees/', 'AdminNewGroupsController@ConvertGroupsTrainees');

// مسارات طباعة إيصالات الدفع
Route::get('/admin/receipt/register_fees/{groups_id}/{trainees_id}/', 'Receipt@registerFees');
Route::get('/admin/receipt/groups_fees/{groups_id}/{trainees_id}/', 'Receipt@groupFees');
Route::get('/admin/receipt/certificate_fees/{groups_id}/{trainees_id}/', 'Receipt@certificateFees');

// مسارات حضور المجموعات
Route::get('admin/attendances/taking_attendance/{attendances_id}/{lectures_id}','AdminAttendancesController@taking_attendance');
Route::get('admin/attendances/lectures/{id}','AdminAttendancesController@getLectures');
Route::post('admin/attendances/add_attendance','AdminAttendancesController@add_attendance');
Route::get('admin/attendances/lecturesReport/{id}','AdminAttendancesController@lecturesReport');

// مسارات درجات المتدربين في المجموعات
Route::get('admin/degrees/details/{id}','AdminDegreesController@getDetails');
Route::post('admin/degrees/details','AdminDegreesController@saveDetails');

// مسارات نتائج المتدربين في المجموعات
Route::get('admin/results/details/{id}','AdminResultsController@getDetails');
Route::post('admin/results/status','AdminResultsController@status');

// مسار طلب الشهادة
Route::get('/admin/certificates/request/{groups_id}/{trainees_id}/', 'AdminCertificatesController@request');

// المسار الجزر
Route::get('/', function () {
    return view('welcome');
});