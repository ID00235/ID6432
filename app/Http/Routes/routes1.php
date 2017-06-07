<?php
//POTENSI DESA
//IDENTITAS DESA
Route::get('/potensi', "Desa\PotensiIdentitasController@index");
//identitas desa
Route::get('/potensi/edit/identitas', "Desa\PotensiIdentitasController@editidentitas");
Route::post('/potensi/update/identitas', "Desa\PotensiIdentitasController@updateidentitas");

//batas wilayah
Route::group(['prefix' => '/potensi/batas-wilayah'], function () {
    Route::get('/', "Desa\PotensiUmumController@bataswilayah");
    Route::get('/edit/{id}', "Desa\PotensiUmumController@editbataswilayah");
    Route::post('/insert', "Desa\PotensiUmumController@insertbataswilayah");
    Route::post('/update', "Desa\PotensiUmumController@updateBatasWilayah");
    Route::post('/delete', "Desa\PotensiUmumController@deleteBatasWilayah");
});

//ROUTE kepemilikan_lahan_pangan
Route::group(['prefix' => 'potensi/sda/kepemilikan-lahan-pangan'], function () {
    Route::get('/', "Desa\PotensiSdaKepemilikanLahanPanganController@listKepemilikanLahanPangan");
    Route::get('/new', "Desa\PotensiSdaKepemilikanLahanPanganController@newKepemilikanLahanPangan");
    Route::get('/edit/{id}', "Desa\PotensiSdaKepemilikanLahanPanganController@editKepemilikanLahanPangan");
    Route::post('/insert', "Desa\PotensiSdaKepemilikanLahanPanganController@insertKepemilikanLahanPangan");
    Route::post('/update', "Desa\PotensiSdaKepemilikanLahanPanganController@updateKepemilikanLahanPangan");
    Route::post('/delete', "Desa\PotensiSdaKepemilikanLahanPanganController@deleteKepemilikanLahanPangan");
});

//ROUTE hasil_pangan
Route::group(['prefix' => 'potensi/sda/hasil-pangan'], function () {
    Route::get('/', "Desa\PotensiSdaHasilPanganController@listHasilPangan");
    Route::get('/new', "Desa\PotensiSdaHasilPanganController@newHasilPangan");
    Route::get('/edit/{id}', "Desa\PotensiSdaHasilPanganController@editHasilPangan");
    Route::post('/insert', "Desa\PotensiSdaHasilPanganController@insertHasilPangan");
    Route::post('/update', "Desa\PotensiSdaHasilPanganController@updateHasilPangan");
    Route::post('/delete', "Desa\PotensiSdaHasilPanganController@deleteHasilPangan");
});


//ROUTE kepemilikan_lahan_kebun
Route::group(['prefix' =>'potensi/sda/kepemilikan-lahan-kebun'], function(){
Route::get('/', "Desa\PotensiSdaKepemilikanLahanKebunController@listKepemilikanLahanKebun");
Route::get('/new', "Desa\PotensiSdaKepemilikanLahanKebunController@newKepemilikanLahanKebun");
Route::get('/edit/{id}', "Desa\PotensiSdaKepemilikanLahanKebunController@editKepemilikanLahanKebun");
Route::post('/insert', "Desa\PotensiSdaKepemilikanLahanKebunController@insertKepemilikanLahanKebun");
Route::post('/update', "Desa\PotensiSdaKepemilikanLahanKebunController@updateKepemilikanLahanKebun");
Route::post('/delete', "Desa\PotensiSdaKepemilikanLahanKebunController@deleteKepemilikanLahanKebun");
});

//ROUTE hasil_kebun
Route::group(['prefix' =>'potensi/sda/hasil-kebun'], function(){
Route::get('/', "Desa\PotensiSdaHasilKebunController@listHasilKebun");
Route::get('/new', "Desa\PotensiSdaHasilKebunController@newHasilKebun");
Route::get('/edit/{id}', "Desa\PotensiSdaHasilKebunController@editHasilKebun");
Route::post('/insert', "Desa\PotensiSdaHasilKebunController@insertHasilKebun");
Route::post('/update', "Desa\PotensiSdaHasilKebunController@updateHasilKebun");
Route::post('/delete', "Desa\PotensiSdaHasilKebunController@deleteHasilKebun");
//perhitungan data
Route::post('/hitung_nilai_produksi', "Desa\PotensiSdaHasilKebunController@hitungnilaiproduksi");
Route::post('/hitung_saldo_produksi', "Desa\PotensiSdaHasilKebunController@hitungsaldoproduksi");
});

//ROUTE populasi_ternak
Route::group(['prefix' =>'potensi/sda/populasi-ternak'], function(){
Route::get('/', "Desa\PotensiSdaPopulasiTernakController@listPopulasiTernak");
Route::get('/new', "Desa\PotensiSdaPopulasiTernakController@newPopulasiTernak");
Route::get('/edit/{id}', "Desa\PotensiSdaPopulasiTernakController@editPopulasiTernak");
Route::post('/insert', "Desa\PotensiSdaPopulasiTernakController@insertPopulasiTernak");
Route::post('/update', "Desa\PotensiSdaPopulasiTernakController@updatePopulasiTernak");
Route::post('/delete', "Desa\PotensiSdaPopulasiTernakController@deletePopulasiTernak");
});


//ROUTE produksi_ternak
Route::group(['prefix' =>'potensi/sda/produksi-ternak'], function(){
Route::get('/', "Desa\PotensiSdaProduksiTernakController@listProduksiTernak");
Route::get('/new', "Desa\PotensiSdaProduksiTernakController@newProduksiTernak");
Route::get('/edit/{id}', "Desa\PotensiSdaProduksiTernakController@editProduksiTernak");
Route::post('/insert', "Desa\PotensiSdaProduksiTernakController@insertProduksiTernak");
Route::post('/update', "Desa\PotensiSdaProduksiTernakController@updateProduksiTernak");
Route::post('/delete', "Desa\PotensiSdaProduksiTernakController@deleteProduksiTernak");
});

//ROUTE jumlah_penduduk
Route::group(['prefix' =>'potensi/sdm/jumlah-penduduk'], function(){
Route::get('/', "Desa\PotensiSdmJumlahPendudukController@listJumlahPenduduk");
Route::get('/new', "Desa\PotensiSdmJumlahPendudukController@newJumlahPenduduk");
Route::get('/edit/{id}', "Desa\PotensiSdmJumlahPendudukController@editJumlahPenduduk");
Route::post('/insert', "Desa\PotensiSdmJumlahPendudukController@insertJumlahPenduduk");
Route::post('/update', "Desa\PotensiSdmJumlahPendudukController@updateJumlahPenduduk");
Route::post('/delete', "Desa\PotensiSdmJumlahPendudukController@deleteJumlahPenduduk");
});

//ROUTE tingkat_usia
Route::group(['prefix' =>'potensi/sdm/tingkat-usia'], function(){
Route::get('/', "Desa\PotensiSdmTingkatUsiaController@listTingkatUsia");
Route::get('/new', "Desa\PotensiSdmTingkatUsiaController@newTingkatUsia");
Route::get('/edit/{id}', "Desa\PotensiSdmTingkatUsiaController@editTingkatUsia");
Route::post('/insert', "Desa\PotensiSdmTingkatUsiaController@insertTingkatUsia");
Route::post('/update', "Desa\PotensiSdmTingkatUsiaController@updateTingkatUsia");
Route::post('/delete', "Desa\PotensiSdmTingkatUsiaController@deleteTingkatUsia");
});

//ROUTE tingkat_pendidikan
Route::group(['prefix' =>'potensi/sdm/tingkat-pendidikan'], function(){
Route::get('/', "Desa\PotensiSdmTingkatPendidikanController@listTingkatPendidikan");
Route::get('/new', "Desa\PotensiSdmTingkatPendidikanController@newTingkatPendidikan");
Route::get('/edit/{id}', "Desa\PotensiSdmTingkatPendidikanController@editTingkatPendidikan");
Route::post('/insert', "Desa\PotensiSdmTingkatPendidikanController@insertTingkatPendidikan");
Route::post('/update', "Desa\PotensiSdmTingkatPendidikanController@updateTingkatPendidikan");
Route::post('/delete', "Desa\PotensiSdmTingkatPendidikanController@deleteTingkatPendidikan");
});

//ROUTE lembaga_pemerintahan
Route::group(['prefix' =>'potensi/sdm/lembaga-pemerintahan'], function(){
Route::get('/', "Desa\PotensiSdmLembagaPemerintahanController@listLembagaPemerintahan");
Route::get('/new', "Desa\PotensiSdmLembagaPemerintahanController@newLembagaPemerintahan");
Route::get('/edit/{id}', "Desa\PotensiSdmLembagaPemerintahanController@editLembagaPemerintahan");
Route::post('/insert', "Desa\PotensiSdmLembagaPemerintahanController@insertLembagaPemerintahan");
Route::post('/update', "Desa\PotensiSdmLembagaPemerintahanController@updateLembagaPemerintahan");
Route::post('/delete', "Desa\PotensiSdmLembagaPemerintahanController@deleteLembagaPemerintahan");
});


//ROUTE lembaga_masyarakat
Route::group(['prefix' =>'potensi/sdm/lembaga-masyarakat'], function(){
Route::get('/', "Desa\PotensiSdmLembagaMasyarakatController@listLembagaMasyarakat");
Route::get('/new', "Desa\PotensiSdmLembagaMasyarakatController@newLembagaMasyarakat");
Route::get('/edit/{id}', "Desa\PotensiSdmLembagaMasyarakatController@editLembagaMasyarakat");
Route::post('/insert', "Desa\PotensiSdmLembagaMasyarakatController@insertLembagaMasyarakat");
Route::post('/update', "Desa\PotensiSdmLembagaMasyarakatController@updateLembagaMasyarakat");
Route::post('/delete', "Desa\PotensiSdmLembagaMasyarakatController@deleteLembagaMasyarakat");
});

 //ROUTE lembaga_ekonomi
Route::group(['prefix' =>'potensi/sdm/lembaga-ekonomi'], function(){
Route::get('/', "Desa\PotensiSdmLembagaEkonomiController@listLembagaEkonomi");
Route::get('/new', "Desa\PotensiSdmLembagaEkonomiController@newLembagaEkonomi");
Route::get('/edit/{id}', "Desa\PotensiSdmLembagaEkonomiController@editLembagaEkonomi");
Route::post('/insert', "Desa\PotensiSdmLembagaEkonomiController@insertLembagaEkonomi");
Route::post('/update', "Desa\PotensiSdmLembagaEkonomiController@updateLembagaEkonomi");
Route::post('/delete', "Desa\PotensiSdmLembagaEkonomiController@deleteLembagaEkonomi");
});

//ROUTE lembaga_keamanan
Route::group(['prefix' =>'potensi/sdm/lembaga-keamanan'], function(){
Route::get('/', "Desa\PotensiSdaLembagaKeamananController@listLembagaKeamanan");
Route::get('/new', "Desa\PotensiSdaLembagaKeamananController@newLembagaKeamanan");
Route::get('/edit/{id}', "Desa\PotensiSdaLembagaKeamananController@editLembagaKeamanan");
Route::post('/insert', "Desa\PotensiSdaLembagaKeamananController@insertLembagaKeamanan");
Route::post('/update', "Desa\PotensiSdaLembagaKeamananController@updateLembagaKeamanan");
Route::post('/delete', "Desa\PotensiSdaLembagaKeamananController@deleteLembagaKeamanan");
});
