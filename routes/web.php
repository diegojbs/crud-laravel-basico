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

use App\Prueba;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('libro','LibroController');

Route::resource('prueba','PruebaController');


Route::get('test',function(){

	$prueba = new Prueba();
	$prueba->nombre="prueba 1";
	$prueba->texto="valor";
	$prueba->estado="A";
	$prueba->save();
	return "perfecto";

});


