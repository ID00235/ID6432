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
            <li class="breadcrumb-item active">Hasil Hutan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Hasil Hutan (Tambah Data Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sda/hasil-hutan')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          {!!Form::open(['url' => URLGroup("potensi/sda/hasil-hutan/insert"), 'name'=>'form-insert-hasil_hutan'])!!}
            {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
            {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
           <?php
                $list = DB::table('komuditas')->where('tipe','hutan')->pluck('nama','id');
                $select = "";
                ?>
                {!!Form::bsSelect($list, $select, 'komoditas', ['required'=>true])!!}
            {{Form::bsText("hasil_produksi","",['class'=>'col-7 double input-right form-control', ])}}
            <?php
            $list = array('BATANG/TH'=>'BATANG/TH', 'LITER/TH'=>'LITER/TH', 'M3/TH'=>'M3/TH', 'TON/TH'=>'TON/TH', );
            $select ='BATANG/TH';
            ?>
            {!!Form::bsSelect($list,$select,"satuan",[])!!}
            <?php
            $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
            $select ='Tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_langsung_ke_konsumen",[])!!}
            <?php
            $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
            $select ='Tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_kepasar",[])!!}
            <?php
            $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
            $select ='Tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_melalui_KUD",[])!!}
            <?php
            $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
            $select ='Tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_melalui_tengkulak",[])!!}
            <?php
            $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
            $select ='Tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_melalui_pengecer",[])!!}
            <?php
            $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
            $select ='Tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"dijual_ke_lumbung_desa_atau_kelurahan",[])!!}
            <?php
            $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
            $select ='Tidak';
            ?>
            {!!Form::bsRadioInline($list,$select,"tidak_dijual",[])!!}
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
        var $validator = $("form[name=form-insert-hasil_hutan]").validate({
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


