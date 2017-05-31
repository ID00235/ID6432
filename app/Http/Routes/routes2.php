<?php
//POTENSI DESA
//IDENTITAS DESA
//Route::get('/potensi', "Desa\PotensiIdentitasController@index");	
//identitas desa
//Route::get('/potensi/edit/identitas', "Desa\PotensiIdentitasController@editidentitas");	
//Route::post('/potensi/update/identitas', "Desa\PotensiIdentitasController@updateidentitas");

//batas wilayah
Route::group(['prefix' =>'sda'], function(){
	Route::get('/', "Desa\PotensiSdaController@psda");	
	//Route::get('/edit/{id}', "Desa\PotensiUmumController@editbataswilayah");	
	//Route::post('/insert', "Desa\PotensiUmumController@insertbataswilayah");	
});


//kualitas udara
Route::group(['prefix' =>'/potensi/kualitas-udara'], function(){
	Route::get('/', "Desa\PotensiKualitasUdaraController@kualitasudara");	
	Route::get('/edit/{id}', "Desa\PotensiUmumController@editkualitasudara");	
	Route::post('/insert', "Desa\PotensiUmumController@insertkualitasudara");	
	Route::post('/update', "Desa\PotensiUmumController@updateBatasWilayah");	
});
