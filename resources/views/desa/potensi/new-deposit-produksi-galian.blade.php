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
            <li class="breadcrumb-item">Sumber Daya Alam</li>
            <li class="breadcrumb-item active">Deposit Dan Produksi Bahan Galian</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Deposit & Produksi Bahan Galian (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/defosit-galian')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
        
                {!!Form::open(['url' => URLGroup("potensi/sda/defosit-galian/insert"), 'name'=>'form-insert-deposit_produksi_galian'])!!}
{{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
{{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}

<?php $list = DB::table('komuditas')->where('tipe','galian')->pluck('nama','id');
$select = "";?>    
{!!Form::bsSelect($list, $select, 'jenis_bahan_galian', ['required'=>true])!!}
<?php
$list = array('Ada Tapi Belum Produktif'=>'ADA TAPI BELUM PRODUKTIF', 'Ada Dan Sudah Produktif'=>'ADA DAN SUDAH PRODUKTIF', );
$select ='Ada Tapi Belum Produktif';
?>
{!!Form::bsSelect($list,$select,"status","",['required'=>true])!!}
<?php
$list = array('Kecil'=>'KECIL', 'Sedang'=>'SEDANG', 'Besar'=>'BESAR', );
$select ='Kecil';
?>
{!!Form::bsRadioInline($list,$select,"hasil_produksi","",['required'=>true])!!}
<?php
$list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
$select ='Ya';
?>
{!!Form::bsRadioInline($list,$select,"di_jual_langsung_ke_konsumen","",['required'=>true])!!}
<?php
$list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
$select ='Ya';
?>
{!!Form::bsRadioInline($list,$select,"di_jual_melalui_kud","",['required'=>true])!!}
<?php
$list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
$select ='Ya';
?>
{!!Form::bsRadioInline($list,$select,"di_jual_melalui_tengkulak","",['required'=>true])!!}
<?php
$list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
$select ='Ya';
?>
{!!Form::bsRadioInline($list,$select,"di_jual_melalui_pengecer","",['required'=>true])!!}
<?php
$list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
$select ='Ya';
?>
{!!Form::bsRadioInline($list,$select,"di_jual_ke_perusahaan","",['required'=>true])!!}
<?php
$list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
$select ='Ya';
?>
{!!Form::bsRadioInline($list,$select,"di_jual_ke_lumbung_desa_kelurahan","",['required'=>true])!!}
<?php
$list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
$select ='Ya';
?>
{!!Form::bsRadioInline($list,$select,"tidak_dijual","",['required'=>true])!!}
<?php
$list = array('Pemerintah'=>'PEMERINTAH', 'Swasta'=>'SWASTA', 'Perorangan'=>'PERORANGAN', 'Adat'=>'ADAT', 'Lainnya'=>'LAINNYA', );
$select ='Pemerintah';
?>
{!!Form::bsSelect($list,$select,"kepemilikan","",['required'=>true])!!}
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
    
var $validator = $("form[name=form-insert-deposit_produksi_galian]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
jenis_bahan_galian: {required:true},
status: {required:true},
hasil_produksi: {required:true},
di_jual_langsung_ke_konsumen: {required:true},
di_jual_melalui_kud: {required:true},
di_jual_melalui_tengkulak: {required:true},
di_jual_melalui_pengecer: {required:true},
di_jual_ke_perusahaan: {required:true},
di_jual_ke_lumbung_desa_kelurahan: {required:true},
tidak_dijual: {required:true},
kepemilikan: {required:true},
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


