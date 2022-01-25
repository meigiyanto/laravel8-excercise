<?php

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

Route::get('/employee', 'EmployeeController@index');
Route::get('/employee/fprint', 'EmployeeController@fprint');
Route::get('/employee/create','EmployeeController@create');
Route::get('/employee/search','EmployeeController@search');
Route::get('/employee/edit/{id}','EmployeeController@edit');
Route::get('/employee/destroy/{id}','EmployeeController@destroy');
Route::post('/employee/store','EmployeeController@store');
Route::post('/employee/update','EmployeeController@update');

Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/create','PegawaiController@create');
Route::get('/pegawai/edit/{id}','PegawaiController@edit');
Route::get('/pegawai/search','PegawaiController@search');
Route::get('/pegawai/destroy/{id}','PegawaiController@destroy');
Route::post('/pegawai/store','PegawaiController@store');
Route::post('/pegawai/update/{id}','PegawaiController@update');

Route::get('/upload', 'UploadController@upload');
Route::post('/upload/proses', 'UploadController@proses_upload');
Route::get('/upload/hapus/{id}', 'UploadController@hapus');

Route::get('/notifikasi','NotificationController@index');
Route::get('/notifikasi/sukses','NotificationController@sukses');
Route::get('/notifikasi/peringatan','NotificationController@peringatan');
Route::get('/notifikasi/gagal','NotificationController@gagal');

Route::get('/pengguna', 'PenggunaController@index');
Route::get('/article', 'ArticleController@index');
Route::get('/anggota', 'AnggotaController@index');

Route::get('/student', 'StudentController@index');
Route::get('/student/export_excel', 'StudentController@export_excel');
Route::get('/student/import_excel', 'StudentController@import_excel');

Route::resource('contacts', ContactController::class);