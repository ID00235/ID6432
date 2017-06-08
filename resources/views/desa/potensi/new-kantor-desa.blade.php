<?php
$id_desa = Auth::user()->userdesa();
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.potensi")
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Potensi</a></li>
            <li class="breadcrumb-item">Sarana Dan Prasarana</li>
            <li class="breadcrumb-item active">Kantor Desa</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Kantor Desa (Tambah Data Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sdm/kantor-desa')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
            {!!Form::open(['url' => URLGroup("potensi/sdm/kantor-desa/insert"), 'name'=>'form-insert-kantor_desa'])!!}
{{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
<b style="color:blue;">Gedung Kantor</b><hr>
{{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"gedung_kantor",[])!!}
{{Form::bsText("Jumlah_ruang_kerja_ruang","",['class'=>'col-7 double input-right form-control', ])}}
<?php
$list = array('Baik'=>'BAIK', 'Rusak'=>'RUSAK', );
$select ='Baik';
?>
{!!Form::bsRadioInline($list,$select,"kondisi",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"balai_desa_Kelurahan_atau_Sejenisnya",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"Listrik",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"air_bersih",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"telepon",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"rumah_dinas_kepala_desa_atau_lurah",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"rumah_dinas_perangkat",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"fasilitas_lainnya",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"mesin_tik_buah",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"meja_buah",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"kursi_buah",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"lemari_arsip_buah",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"komputer_unit",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"mesin_fax_unit",[])!!}
<?php
$list = array('Ada'=>'ADA', 'Tidak Ada'=>'TIDAK ADA', );
$select ='Ada';
?>
{!!Form::bsRadioInline($list,$select,"kendaraan_dinas_unit",[])!!}
<b style="color:blue;">Administrasi Pemerintahan</b><hr>
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_data_peraturan_desa",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_keputusan_kepala_desa_atau_lurah",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_administrasi_kependudukan",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_data_inventaris",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_data_aparat",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_data_tanah_kas_desa",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_administras_pajak_dan_retribusi",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_data_tanah",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_laporan_pengaduan_masyarakat",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_agenda_ekspedisi",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_profil_desa_dan_kelurahan",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_data_induk_penduduk",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_data_mutasi_penduduk",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_rekapitulasi_penduduk_akhir_bulan",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_registrasi_pelayanan_penduduk",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_data_penduduk_sementara",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_anggaran_penerimaan",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_anggaran_pengeluaran_pegawai_atau_pembangunan",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_kas_umum",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_kas_pembantu_penerimaan",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_kas_pembantu_pengeluaran_rutin_atau_pembangunan",[])!!}
<?php
$list = array('Ada dan Terisi'=>'ADA DAN TERISI', 'Ada dan Tidak Terisi'=>'ADA DAN TIDAK TERISI', 'Tidak Terisi'=>'TIDAK TERISI', );
$select ='Ada dan Terisi';
?>
{!!Form::bsRadioInline($list,$select,"buku_data_lembaga_kemasyarakatan",[])!!}
{!!Form::bsSubmit('Simpan',"")!!}
{!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
       var $validator = $("form[name=form-insert-kantor_desa]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
},
messages: {
},
submitHandler: function(form) {
form.submit();
}
});

    })
</script>
@endsection


