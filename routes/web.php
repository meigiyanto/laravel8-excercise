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

Route::get('/karyawan', 'KaryawanController@index');
Route::get('/karyawan/fprint', 'KaryawanController@fprint');
Route::get('/karyawan/tambah','KaryawanController@tambah');
Route::get('/karyawan/edit/{id}','KaryawanController@edit');
Route::get('/karyawan/hapus/{id}','KaryawanController@hapus');
Route::post('/karyawan/store','KaryawanController@store');
Route::post('/karyawan/update','KaryawanController@update');

Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/tambah','PegawaiController@tambah');
Route::get('/pegawai/edit/{id}','PegawaiController@edit');
Route::get('/pegawai/hapus/{id}','PegawaiController@hapus');
Route::post('/pegawai/store','PegawaiController@store');
Route::post('/pegawai/update','PegawaiController@update');

Route::get('/pengguna', 'PenggunaController@index');
Route::get('/article', 'ArticleController@index');
Route::get('/anggota', 'DenmasgieController@index');

Route::get('/upload', 'UploadController@upload');
Route::post('/upload/proses', 'UploadController@proses_upload');
Route::get('/upload/hapus/{id}', 'UploadController@hapus');

Route::get('/notifikasi','NotificationController@index');
Route::get('/notifikasi/sukses','NotificationController@sukses');
Route::get('/notifikasi/peringatan','NotificationController@peringatan');
Route::get('/notifikasi/gagal','NotificationController@gagal');

Route::get('/siswa', 'SiswaController@index');
Route::get('/siswa/export_excel', 'SiswaController@export_excel');
Route::post('/siswa/import_excel', 'SiswaController@import_excel');
