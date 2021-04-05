<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin');
Auth::routes();

Route::group(['middleware' => 'auth','oauth:user'], function () {
    Route::get('isikrs', '\App\Http\Controllers\IsiKRSController@index')->name('isikrs');
    Route::post('isikrs/create', '\App\Http\Controllers\IsiKRSController@create')->name('isikrs.create');
    Route::get('datakrs/show', '\App\Http\Controllers\IsiKRSController@krsmahasiswa')->name('isikrs.show');
});

Route::group(['middleware' => 'auth','oauth:admin'], function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::resource('/user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('/profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
    //User
    Route::get('user', '\App\Http\Controllers\UserController@index')->name('user');
    Route::post('user/create', '\App\Http\Controllers\UserController@create')->name('user.create');
    Route::delete('user/delete/{id}', '\App\Http\Controllers\UserController@delete')->name('user.delete');
    Route::put('user/update/{id}', '\App\Http\Controllers\UserController@update')->name('user.update');
    //Biodata Mahasiswa
    Route::get('mahasiswa', '\App\Http\Controllers\MahasiswaController@index')->name('mahasiswa');
    Route::post('mahasiswa/create', '\App\Http\Controllers\MahasiswaController@create')->name('mahasiswa.create');
    Route::delete('mahasiswa/delete/{id}', '\App\Http\Controllers\MahasiswaController@delete')->name('mahasiswa.delete');
    Route::put('mahasiswa/update/{id}', '\App\Http\Controllers\MahasiswaController@update')->name('mahasiswa.update');
    //Data KRS
    Route::get('datakrs/detail', '\App\Http\Controllers\DataKRSController@detaildatakrs')->name('datakrs.detail');
    Route::get('datakrs', '\App\Http\Controllers\DataKRSController@index')->name('datakrs');
    //matakuliah
    Route::get('/matakuliah', '\App\Http\Controllers\MataKuliahController@index')->name('matakuliah');
    Route::post('/matakuliah/create', '\App\Http\Controllers\MataKuliahController@create')->name('matakuliah.create');
    Route::delete('/matakuliah/delete/{id}', '\App\Http\Controllers\MataKuliahController@delete')->name('matakuliah.delete');
    Route::put('/matakuliah/update/{id}', '\App\Http\Controllers\MataKuliahController@update')->name('matakuliah.edit');
});
