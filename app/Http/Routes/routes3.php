<?php
//DATA DASAR KELUARGA
//ROUTE kepala_keluarga
Route::group(['prefix' =>'ddk/kepala-keluarga'], function(){
Route::get('/', "Desa\DdkKepalaKeluargaController@listKepalaKeluarga");
Route::get('/datatable', "Desa\DdkKepalaKeluargaController@datatable");
Route::get('/new', "Desa\DdkKepalaKeluargaController@newKepalaKeluarga");
Route::get('/edit/{id}', "Desa\DdkKepalaKeluargaController@editKepalaKeluarga");
Route::post('/insert', "Desa\DdkKepalaKeluargaController@insertKepalaKeluarga");
Route::post('/update', "Desa\DdkKepalaKeluargaController@updateKepalaKeluarga");
Route::post('/delete', "Desa\DdkKepalaKeluargaController@deleteKepalaKeluarga");

//anggota keluarga
Route::get('/anggota-keluarga/{id}', "Desa\DdkKepalaKeluargaController@anggotakeluarga");
Route::get('/anggota-keluarga/{id}/new', "Desa\DdkKepalaKeluargaController@anggotakeluargabaru");
Route::get('/anggota-keluarga/{id}/edit/{ak}', "Desa\DdkKepalaKeluargaController@editanggotakeluarga");
Route::get('/anggota-keluarga/{id}/detail/{ak}', "Desa\DdkKepalaKeluargaController@detailanggotakeluarga");
Route::post('/anggota-keluarga/{id}/insert', "Desa\DdkKepalaKeluargaController@insertanggotakeluarga");
Route::post('/anggota-keluarga/{id}/update', "Desa\DdkKepalaKeluargaController@updateanggotakeluarga");
Route::post('/anggota-keluarga/{id}/delete', "Desa\DdkKepalaKeluargaController@deleteanggotakeluarga");

//data kuesioner
Route::get('/kesejahteraan-keluarga/{id}', "Desa\DdkKepalaKeluargaController@datakesejahteraankeluarga");
Route::get('/kesejahteraan-keluarga/edit/{id}', "Desa\DdkKepalaKeluargaController@editdatakesejahteraankeluarga");
Route::get('/kesejahteraan-keluarga/new/{id}', "Desa\DdkKepalaKeluargaController@datakesejahteraankeluargabaru");
Route::post('/kesejahteraan-keluarga/{id}/insert', "Desa\DdkKepalaKeluargaController@insertdatakesejahteraankeluarga");
Route::post('/kesejahteraan-keluarga/{id}/update', "Desa\DdkKepalaKeluargaController@updatedatakesejahteraankeluarga");
Route::post('/kesejahteraan-keluarga/{id}/delete', "Desa\DdkKepalaKeluargaController@deletedatakesejahteraankeluarga");

});

