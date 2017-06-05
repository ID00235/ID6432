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
            <li class="breadcrumb-item">Lembaga</li>
            <li class="breadcrumb-item active">Lembaga Ekonomi</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Lembaga Ekonomi (Tambah Data Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sdm/lembaga-ekonomi')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
            {!!Form::open(['url' => URLGroup("potensi/sdm/lembaga-ekonomi/insert"), 'name'=>'form-insert-lembaga_ekonomi'])!!}
            {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
            {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
            <?php
            $list = array('Lembaga Ekonomi dan Unit Usaha Desa'=>'LEMBAGA EKONOMI DAN UNIT USAHA DESA', 'Jasa Lembaga Keuangan'=>'JASA LEMBAGA KEUANGAN', 'Industri Kecil dan Menengah'=>'INDUSTRI KECIL DAN MENENGAH', );
            $select ='Lembaga Ekonomi dan Unit Usaha Desa';
            ?>
            {!!Form::bsSelect($list,$select,"kategori",['required'=>true])!!}
            <?php
            $list = array('Badan Usaha Milik Desa'=>'BADAN USAHA MILIK DESA', 'Kelompok Simpan Pinjam'=>'KELOMPOK SIMPAN PINJAM', 'Koperasi Simpan Pinjam'=>'KOPERASI SIMPAN PINJAM', 'Koperasi Unit Desa'=>'KOPERASI UNIT DESA', );
            $select ='Badan Usaha Milik Desa';
            ?>
            {!!Form::bsSelect($list,$select,"jenis_lembaga",['required'=>true])!!}
            {{Form::bsText("jumlah","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
            {{Form::bsText("jumlah_pengurus","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
            {{Form::bsText("jumlah_kegiatan","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
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
            var $validator = $("form[name=form-insert-lembaga_ekonomi]").validate({
            ignore:[],
            rules: {
            id_desa: {required:true},
            tanggal: {required:true},
            kategori: {required:true},
            jenis_lembaga: {required:true},
            jumlah: {required:true},
            jumlah_pengurus: {required:true},
            jumlah_kegiatan: {required:true},
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


