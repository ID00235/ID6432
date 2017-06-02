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

///////SUMBER DAYA AIR ===========================================================>>>>>>>>>>

//ROUTE air_bersih
Route::group(['prefix' =>'potensi/sda/sumber-air-bersih'], function(){
Route::get('/', "Desa\PotensiSdaAirBersihController@listAirBersih");
Route::get('/new', "Desa\PotensiSdaAirBersihController@newAirBersih");
Route::get('/edit/{id}', "Desa\PotensiSdaAirBersihController@editAirBersih");
Route::post('/insert', "Desa\PotensiSdaAirBersihController@insertAirBersih");
Route::post('/update', "Desa\PotensiSdaAirBersihController@updateAirBersih");
Route::post('/delete', "Desa\PotensiSdaAirBersihController@deleteAirBersih");
});

//ROUTE air_panas
Route::group(['prefix' =>'potensi/sda/air-panas'], function(){
Route::get('/', "Desa\PotensiSdaAirPanasController@listAirPanas");
Route::get('/new', "Desa\PotensiSdaAirPanasController@newAirPanas");
Route::get('/edit/{id}', "Desa\PotensiSdaAirPanasController@editAirPanas");
Route::post('/insert', "Desa\PotensiSdaAirPanasController@insertAirPanas");
Route::post('/update', "Desa\PotensiSdaAirPanasController@updateAirPanas");
Route::post('/delete', "Desa\PotensiSdaAirPanasController@deleteAirPanas");
});

//ROUTE kualitas_air_minum
Route::group(['prefix' =>'potensi/sda/kualitas-air-minum'], function(){
Route::get('/', "Desa\PotensiSdaKualitasAirMinumController@listKualitasAirMinum");
Route::get('/new', "Desa\PotensiSdaKualitasAirMinumController@newKualitasAirMinum");
Route::get('/edit/{id}', "Desa\PotensiSdaKualitasAirMinumController@editKualitasAirMinum");
Route::post('/insert', "Desa\PotensiSdaKualitasAirMinumController@insertKualitasAirMinum");
Route::post('/update', "Desa\PotensiSdaKualitasAirMinumController@updateKualitasAirMinum");
Route::post('/delete', "Desa\PotensiSdaKualitasAirMinumController@deleteKualitasAirMinum");
});

//ROUTE potensi_pemanfaatan_air
Route::group(['prefix' =>'potensi/sda/potensi-pemanfaatan-air'], function(){
Route::get('/', "Desa\PotensiSdaPotensiPemanfaatanAirController@listPotensiPemanfaatanAir");
Route::get('/new', "Desa\PotensiSdaPotensiPemanfaatanAirController@newPotensiPemanfaatanAir");
Route::get('/edit/{id}', "Desa\PotensiSdaPotensiPemanfaatanAirController@editPotensiPemanfaatanAir");
Route::post('/insert', "Desa\PotensiSdaPotensiPemanfaatanAirController@insertPotensiPemanfaatanAir");
Route::post('/update', "Desa\PotensiSdaPotensiPemanfaatanAirController@updatePotensiPemanfaatanAir");
Route::post('/delete', "Desa\PotensiSdaPotensiPemanfaatanAirController@deletePotensiPemanfaatanAir");
});

///////Perikanan==========================================================>>>>>>>>>>
//ROUTE produksi_ikan_laut
Route::group(['prefix' =>'potensi/sda/alat-produksi-ikan-laut'], function(){
Route::get('/', "Desa\PotensiSdaProduksiIkanLautController@listProduksiIkanLaut");
Route::get('/new', "Desa\PotensiSdaProduksiIkanLautController@newProduksiIkanLaut");
Route::get('/edit/{id}', "Desa\PotensiSdaProduksiIkanLautController@editProduksiIkanLaut");
Route::post('/insert', "Desa\PotensiSdaProduksiIkanLautController@insertProduksiIkanLaut");
Route::post('/update', "Desa\PotensiSdaProduksiIkanLautController@updateProduksiIkanLaut");
Route::post('/delete', "Desa\PotensiSdaProduksiIkanLautController@deleteProduksiIkanLaut");
});

 //ROUTE produksi_ikan_tawar
Route::group(['prefix' =>'potensi/sda/alat-produksi-ikan-tawar'], function(){
Route::get('/', "Desa\PotensiSdaProduksiIkanTawarController@listProduksiIkanTawar");
Route::get('/new', "Desa\PotensiSdaProduksiIkanTawarController@newProduksiIkanTawar");
Route::get('/edit/{id}', "Desa\PotensiSdaProduksiIkanTawarController@editProduksiIkanTawar");
Route::post('/insert', "Desa\PotensiSdaProduksiIkanTawarController@insertProduksiIkanTawar");
Route::post('/update', "Desa\PotensiSdaProduksiIkanTawarController@updateProduksiIkanTawar");
Route::post('/delete', "Desa\PotensiSdaProduksiIkanTawarController@deleteProduksiIkanTawar");
});

 //ROUTE jenis_produksi_ikan
Route::group(['prefix' =>'potensi/sda/jenis-produksi-ikan'], function(){
Route::get('/', "Desa\PotensiSdaJenisProduksiIkanController@listJenisProduksiIkan");
Route::get('/new', "Desa\PotensiSdaJenisProduksiIkanController@newJenisProduksiIkan");
Route::get('/edit/{id}', "Desa\PotensiSdaJenisProduksiIkanController@editJenisProduksiIkan");
Route::post('/insert', "Desa\PotensiSdaJenisProduksiIkanController@insertJenisProduksiIkan");
Route::post('/update', "Desa\PotensiSdaJenisProduksiIkanController@updateJenisProduksiIkan");
Route::post('/delete', "Desa\PotensiSdaJenisProduksiIkanController@deleteJenisProduksiIkan");
});

///////==========================================================>>>>>>>>>>





















//kualitas udara
Route::group(['prefix' =>'/potensi/kualitas-udara'], function(){
	Route::get('/', "Desa\PotensiKualitasUdaraController@kualitasudara");	
	Route::get('/edit/{id}', "Desa\PotensiUmumController@editkualitasudara");	
	Route::post('/insert', "Desa\PotensiUmumController@insertkualitasudara");	
	Route::post('/update', "Desa\PotensiUmumController@updateBatasWilayah");	
});
