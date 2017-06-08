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
    			Hasil Hutan (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sda/hasil-hutan')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          {!!Form::open(['url' => URLGroup("potensi/sda/hasil-hutan/update"), 'name'=>'form-update-hasil_hutan'])!!}
          {{Form::hidden("id",Crypt::encrypt($data->id))}}
          {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
          
          <?php
                $list = DB::table('komuditas')->where('tipe','hutan')->pluck('nama','id');
                $select = $data->komoditas;
                ?>
                {!!Form::bsSelect($list, $select, 'komoditas', ['required'=>true])!!}

          {{Form::bsText("hasil_produksi",$data->hasil_produksi,['class'=>'col-12 double input-right form-control', ])}}
          <?php
          $list = array('BATANG/TH'=>'BATANG/TH', 'LITER/TH'=>'LITER/TH', 'M3/TH'=>'M3/TH', 'TON/TH'=>'TON/TH', );
          $select =$data->satuan;
          ?>
          {!!Form::bsSelect($list,$select,"satuan",[])!!}
          <?php
          $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
          $select =$data->dijual_langsung_ke_konsumen;
          ?>
          {!!Form::bsRadioInline($list,$select,"dijual_langsung_ke_konsumen",[])!!}
          <?php
          $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
          $select =$data->dijual_kepasar;
          ?>
          {!!Form::bsRadioInline($list,$select,"dijual_kepasar",[])!!}
          <?php
          $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
          $select =$data->dijual_melalui_KUD;
          ?>
          {!!Form::bsRadioInline($list,$select,"dijual_melalui_KUD",[])!!}
          <?php
          $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
          $select =$data->dijual_melalui_tengkulak;
          ?>
          {!!Form::bsRadioInline($list,$select,"dijual_melalui_tengkulak",[])!!}
          <?php
          $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
          $select =$data->dijual_melalui_pengecer;
          ?>
          {!!Form::bsRadioInline($list,$select,"dijual_melalui_pengecer",[])!!}
          <?php
          $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
          $select =$data->dijual_ke_lumbung_desa_atau_kelurahan;
          ?>
          {!!Form::bsRadioInline($list,$select,"dijual_ke_lumbung_desa_atau_kelurahan",[])!!}
          <?php
          $list = array('Ya'=>'YA', 'Tidak'=>'TIDAK', );
          $select =$data->tidak_dijual;
          ?>
          {!!Form::bsRadioInline($list,$select,"tidak_dijual",[])!!}
          {!!Form::bsSubmit('Simpan',"")!!}
          {!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("potensi/sda/hasil-hutan/delete"), 'name'=>'form-delete-hasil_hutan'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!}


@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
            var $validator = $("form[name=form-update-hasil_hutan]").validate({
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


            $("#delete").on("click", function(){
            bootbox.confirm({
            title: "Hapus",
            message: "Anda Yakin Ingin Menghapus Data Ini.",
            buttons: {
            cancel: {
            label: 'Batal'
            },
            confirm: { label: 'Ya, Hapus'
            }
            },
            callback: function (result) {
            if(result){ $("form[name=form-delete-hasil_hutan]").submit();}
            }
            });
            })
    })
</script>
@endsection

