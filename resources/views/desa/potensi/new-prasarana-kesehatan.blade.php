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
            <li class="breadcrumb-item">Prasarana-Sarana</li>
            <li class="breadcrumb-item active"> Prasarana Kesehatan</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Prasarana Kesehatan (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sdm/prasarana-kesehatan')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
                       {!!Form::open(['url' => URLGroup("potensi/sdm/prasarana-kesehatan/insert"), 'name'=>'form-insert-prasarana_kesehatan'])!!}
{{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
{{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
<?php
$list = array('Apotik'=>'APOTIK', 'Balai Kesehatan Ibu dan Anak'=>'BALAI KESEHATAN IBU DAN ANAK', 'Balai pengobatan masyarakat yayasan/swasta'=>'BALAI PENGOBATAN MASYARAKAT YAYASAN/SWASTA', 'Gudang menyimpan obat'=>'GUDANG MENYIMPAN OBAT', 'Jumlah Rumah/Kantor Praktek Dokter'=>'JUMLAH RUMAH/KANTOR PRAKTEK DOKTER', 'Poliklinik/balai pengobatan'=>'POLIKLINIK/BALAI PENGOBATAN', 'Posyandu'=>'POSYANDU', 'Puskesmas'=>'PUSKESMAS', 'Puskesmas Pembantu'=>'PUSKESMAS PEMBANTU', 'Rumah Bersalin'=>'RUMAH BERSALIN', 'Rumah Sakit Mata'=>'RUMAH SAKIT MATA', 'Rumah sakit umum'=>'RUMAH SAKIT UMUM', 'Toko obat'=>'TOKO OBAT', );
$select ='Apotik';
?>
{!!Form::bsSelect($list,$select,"jenis_prasarana_kesehatan",['required'=>true])!!}
{{Form::bsText("jumlah_unit","",['class'=>'col-7 numerik input-right form-control', 'required'=>true])}}
{!!Form::bsSubmit('Simpan',"")!!}
{!!Form::close()!!} 
            </div>
        </div>
    </div>
</div>
@endsection
@section("javascript")
<script type="text/javascript">
var $validator = $("form[name=form-insert-prasarana_kesehatan]").validate({
ignore:[],
rules: {
id_desa: {required:true},
tanggal: {required:true},
jenis_prasarana_kesehatan: {required:true},
jumlah_unit: {required:true},
},
messages: {
},
submitHandler: function(form) {
form.submit();
}
});

    
</script>
@endsection


