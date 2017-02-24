<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/jabatan', 'JabatanController');
Route::resource('/golongan', 'GolonganController');
Route::resource('/pegawai', 'PegawaiController');
Route::resource('/kategori', 'KategoriController');
Route::resource('/lemburpegawai', 'LemburpegawaiController');
Route::resource('/tunjangan','TunjanganController');
Route::resource('/tunjanganpegawai','TunjanganpegawaiController');
Route::resource('/penggajian', 'PenggajianController');
Route::resource('/home', 'HomeController@index');
