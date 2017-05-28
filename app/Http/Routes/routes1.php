<?php
//POTENSI DESA
//IDENTITAS DESA
Route::get('/potensi', "Desa\PotensiIdentitasController@index");	
Route::get('/potensi/edit/identitas', "Desa\PotensiIdentitasController@editidentitas");	
Route::post('/potensi/update/identitas', "Desa\PotensiIdentitasController@updateidentitas");	