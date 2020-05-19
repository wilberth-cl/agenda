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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('agenda','AgendaController');

Route::get('/cancelar',function(){
	return redirect()->route('agenda.index')->with('cancelando','¡Acción Cancelada!');
})->name('cancelar');

Route::get('/agenda/{id}/confirm','AgendaController@confirm')->name('agenda.paraconfirmar')->middleware('auth');

//Route::resource('','AgendaController'); inicia solo con acceder