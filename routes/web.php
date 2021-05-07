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

Route::get('/', 'LenguajesProgramacionController@index')->name('inicio');
Route::post('/store', 'LenguajesProgramacionController@store')->name('store');
Route::get('/editar/{id}', 'LenguajesProgramacionController@edit')->name('editar');
Route::put('/update/{id}', 'LenguajesProgramacionController@update')->name('update');
Route::delete('/destroy/{id}', 'LenguajesProgramacionController@destroy')->name('eliminar');