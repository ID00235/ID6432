<?php
Route::get('/', function (){
	return Redirect::to('desa/home');
});

Route::get('/home', "Desa\HomeController@index");

Route::group(['prefix' =>'potensi'], function(){
	Route::get('/', "Desa\PotensiIdentitasController@index");					
});