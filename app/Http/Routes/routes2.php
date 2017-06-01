<?php

//Sumber Daya Alam / Jenis Lahan


//ROUTE jenis_lahan
Route::group(['prefix' =>'/potensi/sda/jenis-lahan'], function(){
Route::get('/', "Desa\PotensiSdaJenisLahanController@listJenisLahan");
Route::get('/new', "Desa\PotensiSdaJenisLahanController@newJenisLahan");
Route::get('/edit/{id}', "Desa\PotensiSdaJenisLahanController@editJenisLahan");
Route::post('/insert', "Desa\PotensiSdaJenisLahanController@insertJenisLahan");
Route::post('/update', "Desa\PotensiSdaJenisLahanController@updateJenisLahan");
Route::post('/delete', "Desa\PotensiSdaJenisLahanController@deleteJenisLahan");
});


//ROUTE deposit_produksi_galian
Route::group(['prefix' =>'potensi/sda/defosit-galian'], function(){
Route::get('/', "Desa\PotensiSdaDepositProduksiGalianController@listDepositProduksiGalian");
Route::get('/new', "Desa\PotensiSdaDepositProduksiGalianController@newDepositProduksiGalian");
Route::get('/edit/{id}', "Desa\PotensiSdaDepositProduksiGalianController@editDepositProduksiGalian");
Route::post('/insert', "Desa\PotensiSdaDepositProduksiGalianController@insertDepositProduksiGalian");
Route::post('/update', "Desa\PotensiSdaDepositProduksiGalianController@updateDepositProduksiGalian");
Route::post('/delete', "Desa\PotensiSdaDepositProduksiGalianController@deleteDepositProduksiGalian");
});



//kualitas udara
Route::group(['prefix' =>'/potensi/kualitas-udara'], function(){
	Route::get('/', "Desa\PotensiKualitasUdaraController@kualitasudara");	
	Route::get('/edit/{id}', "Desa\PotensiUmumController@editkualitasudara");	
	Route::post('/insert', "Desa\PotensiUmumController@insertkualitasudara");	
	Route::post('/update', "Desa\PotensiUmumController@updateBatasWilayah");	
});
