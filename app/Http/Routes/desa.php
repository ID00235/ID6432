<?php
Route::get('/', function (){
	return Redirect::to('desa/home');
});

Route::get('/home', "Desa\HomeController@index");
//programmer 1
require "routes1.php";
//programmer 2
require "routes2.php";

//programmer 1
require "routes3.php";
//programmer 2
require "routes4.php";