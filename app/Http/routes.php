<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',"LoginController@login");

Route::get('login', "LoginController@login");
Route::get('logout', "LoginController@logout");
Route::post('submit-login', "LoginController@submitlogin");


Route::get('generate-form', "GenerateController@generateform");

Route::get('form/baru/{table_name}', function($table_name){
	$columns = DB::select('show columns from '.$table_name);
	return view('form-builder',array("columns"=>$columns,"table_name"=>$table_name));
});
Route::get('form/edit/{table_name}', function($table_name){
	$columns = DB::select('show columns from '.$table_name);
	return view('edit-builder',array("columns"=>$columns,"table_name"=>$table_name));
});