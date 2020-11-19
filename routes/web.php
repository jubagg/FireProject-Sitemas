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
})->middleware(['verified','auth','usuarios', 'cuartel' ])->name('home');



Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');

//ingreso fed
Route::post('/federacion', 'ControllerFederaciones@setFederacion')->name('federaciones');
Route::get('/federacion/dashboard/{federacion?}', 'ControllerFederaciones@federacionDashboard')->name('federaciones.dashboard');
//bomberos
Route::get('/federacion/bomberos', 'ControllerBomberos@indexBomberos')->name('bomberos');
Route::post('/federacion/bomberos/bomero/{id?}', 'ControllerBomberos@getBombero')->name('bomberos.bombero');
Route::post('/federacion/bomberos/guardar', 'ControllerBomberos@saveBomberos')->name('bomberos.save');

