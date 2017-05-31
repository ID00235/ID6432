<?php
//POTENSI DESA
//IDENTITAS DESA
Route::get('/potensi', "Desa\PotensiIdentitasController@index");	
//identitas desa
Route::get('/potensi/edit/identitas', "Desa\PotensiIdentitasController@editidentitas");	
Route::post('/potensi/update/identitas', "Desa\PotensiIdentitasController@updateidentitas");

//batas wilayah
Route::group(['prefix' =>'/potensi/batas-wilayah'], function(){
	Route::get('/', "Desa\PotensiUmumController@bataswilayah");	
	Route::get('/edit/{id}', "Desa\PotensiUmumController@editbataswilayah");	
	Route::post('/insert', "Desa\PotensiUmumController@insertbataswilayah");	
	Route::post('/update', "Desa\PotensiUmumController@updateBatasWilayah");	
	Route::post('/delete', "Desa\PotensiUmumController@deleteBatasWilayah");	
});


//ROUTE kepemilikan_lahan_pangan
Route::group(['prefix' =>'potensi/sda/kepemilikan-lahan-pangan'], function(){
Route::get('/', "Desa\PotensiSdaKepemilikanLahanPanganController@listKepemilikanLahanPangan");
Route::get('/edit/{id}', "Desa\PotensiSdaKepemilikanLahanPanganController@editKepemilikanLahanPangan");
Route::post('/insert', "Desa\PotensiSdaKepemilikanLahanPanganController@insertKepemilikanLahanPangan");
Route::post('/update', "Desa\PotensiSdaKepemilikanLahanPanganController@updateKepemilikanLahanPangan");
Route::post('/delete', "Desa\PotensiSdaKepemilikanLahanPanganController@deleteKepemilikanLahanPangan");
});