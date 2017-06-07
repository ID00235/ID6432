<?php
$id_desa = Auth::user()->userdesa();
$id_kk = Hashids::encode($kepala_keluarga->id);
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.ddk")
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data Dasar Keluarga</a></li>
            <li class="breadcrumb-item active">Kesejahteraan Keluarga</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Kesejahteraan Keluarga (Input Data)
    			<div class="pull-right">
    				<a href="{{URLGroup("ddk/kepala-keluarga/kesejahteraan-keluarga/$id_kk")}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	
                Nomor KK / Kepala Keluarga :<br>
                <b>{{$kepala_keluarga->nomor_kk}} / {{$kepala_keluarga->nama_kepala_keluarga}}</b><br><br>   

                {!!Form::open(['url' => URLGroup("ddk/kepala-keluarga/kesejahteraan-keluarga/$id_kk/insert"), 'name'=>'form-insert-kesejahteraan_keluarga'])!!}
                {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                {{Form::hidden("id_kk",$id_kk)}}
                {{Form::bsText("jumlah_penghasilan","",['class'=>'col-7 double input-right form-control', 'required'=>true, 'help'=>'Per Bulan'])}}
                <?php
                $list = array('Milik Sendiri'=>'MILIK SENDIRI', 'Milik Orang Tua'=>'MILIK ORANG TUA', 'Milik Keluarga'=>'MILIK KELUARGA', 'Sewa/Kontrak'=>'SEWA/KONTRAK', 'Pinjam Pakai'=>'PINJAM PAKAI', );
                $select ='Milik Sendiri';
                ?>
                {!!Form::bsSelect($list,$select,"kepemilikan_rumah",['required'=>true])!!}
                <?php
                $list = array('Pra Sejahtera'=>'PRA SEJAHTERA', 'Sejahtera 1'=>'SEJAHTERA 1', 'Sejahtera 2'=>'SEJAHTERA 2', 'Sejahtera 3+'=>'SEJAHTERA 3+', );
                $select ='Sejahtera 1';
                ?>
                {!!Form::bsSelect($list,$select,"kategori_keluarga",['required'=>true])!!}
                <?php
                $list = array('Tidak'=>'TIDAK', 'Ya'=>'YA', );
                $select ='Tidak';
                ?>
                {!!Form::bsRadioInline($list,$select,"penerima_raskin",['required'=>true])!!}
                <?php
                $list = array('Tidak'=>'TIDAK', 'Ya'=>'YA', );
                $select ='Tidak';
                ?>
                {!!Form::bsRadioInline($list,$select,"penerima_blt_blsm",['required'=>true])!!}
                <?php
                $list = array('Tidak'=>'TIDAK', 'Ya'=>'YA', );
                $select ='Tidak';
                ?>
                {!!Form::bsRadioInline($list,$select,"penerima_bpjs_jamkesmas_jamkesda",['required'=>true])!!}
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
        //COPYKEN KE SINI

        var $validator = $("form[name=form-insert-kesejahteraan_keluarga]").validate({
            ignore:[],
            rules: {
            id_desa: {required:true},
            id_kk: {required:true},
            jumlah_penghasilan: {required:true},
            kepemilikan_rumah: {required:true},
            kategori_keluarga: {required:true},
            penerima_raskin: {required:true},
            penerima_blt_blsm: {required:true},
            penerima_bpjs_jamkesmas_jamkesda: {required:true},
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


