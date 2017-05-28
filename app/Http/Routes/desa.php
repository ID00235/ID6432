<?php
Route::get('/', function (){
	return Redirect::to('desa/home');
});

Route::get('/home', "Desa\HomeController@index");

require "routes1.php";