<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index');

Route::get('/massupload', 'MultipleUploadController@upload');
Route::post('/massupload/proses', 'MultipleUploadController@proses_upload');
Route::get('/massupload/delete/{id}', 'MultipleUploadController@destroy');

Route::get('/notifikasi','NotificationController@index');
Route::get('/notifikasi/sukses','NotificationController@sukses');
Route::get('/notifikasi/peringatan','NotificationController@peringatan');
Route::get('/notifikasi/gagal','NotificationController@gagal');

Route::get('/pengguna', 'PenggunaController@index');
Route::get('/article', 'ArticleController@index');
Route::get('/anggota', 'AnggotaController@index');
Route::get('/hash', 'AnggotaController@hash');

Route::get('/student', 'StudentController@index');
Route::get('/student/export_excel', 'StudentController@export_excel');
Route::get('/student/import_excel', 'StudentController@import_excel');

Route::resource('contacts', ContactController::class);

Route::get('/employees/fprint', 'EmployeeController@fprint');
Route::get('/employees/search', 'EmployeeController@search');
Route::resource('employees', EmployeeController::class);
