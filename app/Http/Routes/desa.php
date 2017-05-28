<?php
Route::get('/', function (){
	return Redirect::to('desa/home');
});

Route::get('/home', "Desa\HomeController@index");

Route::get('/potensi', "Desa\PotensiController@index");