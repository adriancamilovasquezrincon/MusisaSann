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

    // Controlador clientes
    Route::get('/api/cliente','ClientesController@index');
    Route::post('/api/cliente/guardar','ClientesController@store')->name('guardar');
    Route::put('/api/cliente/actualizar','ClientesController@update')->name('actualizar');
    Route::delete('/api/cliente/eliminar','ClientesController@delete')->name('eliminar');
    // Controlador  categorias
    Route::get('/api/categoria','CategoriasController@index');
    Route::post('/api/categoria/guardar','CategoriasController@store')->name('guardar');
    Route::put('/api/categoria/actualizar','CategoriasController@update')->name('actualizar');
    Route::delete('/api/categoria/eliminar','CategoriasController@delete')->name('eliminar');
    // Controlador peliculas
    Route::get('/api/pelis','PeliculasController@index');
    Route::post('/api/pelis/guardar','PeliculasController@store')->name('guardar');
    Route::put('/api/pelis/actualizar','PeliculasController@update')->name('actualizar');
    Route::delete('/api/pelis/eliminar','PeliculasController@delete')->name('eliminar');
    // Controlador prestamoPeliculas
    Route::get('/api/prestamo','PrestamosController@index');
    Route::post('/api/prestamo/guardar','PrestamosController@store')->name('guardar');
    Route::put('/api/prestamo/actualizar','PrestamosController@update')->name('actualizar');
    Route::delete('/api/prestamo/eliminar','PrestamosController@delete')->name('eliminar');
});
