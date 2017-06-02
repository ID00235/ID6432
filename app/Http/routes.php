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
Route::get('generate-route', "GenerateController@generateroute");
Route::get('generate-list', "GenerateController@generatelist");
Route::get('generate-form-list', "GenerateController@generateformlist");
Route::post('generate-route-result', "GenerateController@generaterouteresult");
Route::post('generate-list-submit', "GenerateController@generatelistsubmit");

Route::get('form/baru/{table_name}', "GenerateController@generateformbaru");
Route::get('form/edit/{table_name}', "GenerateController@generateformedit");