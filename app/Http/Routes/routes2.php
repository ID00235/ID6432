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

//ROUTE ruang_publik
Route::group(['prefix' =>'potensi/sda/ruang-publik'], function(){
Route::get('/', "Desa\PotensiSdaRuangPublikController@listRuangPublik");
Route::get('/new', "Desa\PotensiSdaRuangPublikController@newRuangPublik");
Route::get('/edit/{id}', "Desa\PotensiSdaRuangPublikController@editRuangPublik");
Route::post('/insert', "Desa\PotensiSdaRuangPublikController@insertRuangPublik");
Route::post('/update', "Desa\PotensiSdaRuangPublikController@updateRuangPublik");
Route::post('/delete', "Desa\PotensiSdaRuangPublikController@deleteRuangPublik");
});


//ROUTE potensi_wisata
Route::group(['prefix' =>'potensi/sda/potensi-wisata'], function(){
Route::get('/', "Desa\PotensiSdaPotensiWisataController@listPotensiWisata");
Route::get('/new', "Desa\PotensiSdaPotensiWisataController@newPotensiWisata");
Route::get('/edit/{id}', "Desa\PotensiSdaPotensiWisataController@editPotensiWisata");
Route::post('/insert', "Desa\PotensiSdaPotensiWisataController@insertPotensiWisata");
Route::post('/update', "Desa\PotensiSdaPotensiWisataController@updatePotensiWisata");
Route::post('/delete', "Desa\PotensiSdaPotensiWisataController@deletePotensiWisata");
});

//ROUTE apotik_hidup
Route::group(['prefix' =>'potensi/sda/apotik-hidup'], function(){
Route::get('/', "Desa\PotensiSdaApotikHidupController@listApotikHidup");
Route::get('/new', "Desa\PotensiSdaApotikHidupController@newApotikHidup");
Route::get('/edit/{id}', "Desa\PotensiSdaApotikHidupController@editApotikHidup");
Route::post('/insert', "Desa\PotensiSdaApotikHidupController@insertApotikHidup");
Route::post('/update', "Desa\PotensiSdaApotikHidupController@updateApotikHidup");
Route::post('/delete', "Desa\PotensiSdaApotikHidupController@deleteApotikHidup");
});


//kualitas udara
Route::group(['prefix' =>'/potensi/kualitas-udara'], function(){
	Route::get('/', "Desa\PotensiKualitasUdaraController@kualitasudara");	
	Route::get('/edit/{id}', "Desa\PotensiUmumController@editkualitasudara");	
	Route::post('/insert', "Desa\PotensiUmumController@insertkualitasudara");	
	Route::post('/update', "Desa\PotensiUmumController@updateBatasWilayah");	
});
