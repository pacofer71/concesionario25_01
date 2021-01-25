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

//Route::get('/', function () {
//    return view('welcome');
//});
//Cargaremos la ruta de inicio que la controla ConcesionarioController
Route::get('/', '\App\Http\Controllers\ConcesionarioController@inicio')->name('inicio');

Route::resource('marcas', '\App\Http\Controllers\MarcaController');

Route::get('coches/{marca}/cochesxmarca', '\App\Http\Controllers\CocheController@cochesxmarca')->name('coches.cochesxmarca');
//Route::get('coches1/{marca}', '\App\Http\Controllers\CocheController@cochesxmarca')->name('coches.cochesxmarca');

Route::resource('coches', '\App\Http\Controllers\CocheController');
