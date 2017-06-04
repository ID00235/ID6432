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
            <li class="breadcrumb-item active">Produksi Peternakan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Produksi Peternakan (Tambah Data Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sda/produksi-ternak')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
                {!!Form::open(['url' => URLGroup("potensi/sda/produksi-ternak/insert"), 'name'=>'form-insert-produksi_ternak'])!!}
                {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                <?php
                $list = array('Air liur burung walet'=>'AIR LIUR BURUNG WALET', 'Bulu'=>'BULU', 'Burung walet'=>'BURUNG WALET', 'Cinderamata'=>'CINDERAMATA', 'Daging'=>'DAGING', 'Hiasan/lukisan'=>'HIASAN/LUKISAN', 'Kerupuk Kulit'=>'KERUPUK KULIT', ' Kulit'=>' KULIT', 'Madu'=>'MADU', 'Susu'=>'SUSU', 'Telur'=>'TELUR', );
                $select ='Air liur burung walet';
                ?>
                {!!Form::bsSelect($list,$select,"jenis_produksi",['required'=>true])!!}
                {{Form::bsText("hasil_produksi","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
                <?php
                $list = array('BATANG/TH'=>'BATANG/TH', 'BUAH/TH'=>'BUAH/TH', 'EKOR/TH'=>'EKOR/TH', 'JENIS/TH'=>'JENIS/TH', 'KG/TH'=>'KG/TH', 'LITER/TH'=>'LITER/TH', 'M/TH'=>'M/TH', 'KUBIK/TH'=>'KUBIK/TH', 'TON/TH'=>'TON/TH', 'UNIT/TH'=>'UNIT/TH', );
                $select ='BATANG/TH';
                ?>
                {!!Form::bsSelect($list,$select,"satuan",['required'=>true])!!}
                {{Form::bsText("nilai_produksi_tahun_ini","",['class'=>'col-7 double input-right form-control', 'required'=>true])}}
                {{Form::bsText("jumlah_ternak","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
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
        var $validator = $("form[name=form-insert-produksi_ternak]").validate({
            ignore:[],
            rules: {
            id_desa: {required:true},
            tanggal: {required:true},
            jenis_produksi: {required:true},
            hasil_produksi: {required:true},
            satuan: {required:true},
            nilai_produksi_tahun_ini: {required:true},
            jumlah_ternak: {required:true},
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


