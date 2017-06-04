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
            <li class="breadcrumb-item active">Hasil Produksi Perkebunan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Hasil Produksi Perkebunan (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sda/hasil-kebun')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          {!!Form::open(['url' => URLGroup("potensi/sda/hasil-kebun/update"), 'name'=>'form-update-hasil_kebun'])!!}
          {{Form::hidden("id",Crypt::encrypt($data->id))}}
          {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
          <?php
                $list = DB::table('komuditas')->where('tipe','kebun')->pluck('nama','id');
                $select = $data->komuditas;
                ?>
          {!!Form::bsSelect($list, $select, 'komuditas', ['required'=>true])!!}
          {{Form::bsText("luas_perkebunan_swasta_negara",$data->luas_perkebunan_swasta_negara,['class'=>'col-12 double input-right form-control', ])}}
          {{Form::bsText("hasil_perkebunan_swasta_negara",$data->hasil_perkebunan_swasta_negara,['class'=>'col-12 double input-right form-control', ])}}
          {{Form::bsText("luas_perkebunan_rakyat",$data->luas_perkebunan_rakyat,['class'=>'col-12 double input-right form-control', ])}}
          {{Form::bsText("hasil_perkebunan_rakyat",$data->hasil_perkebunan_rakyat,['class'=>'col-12 double input-right form-control', ])}}
          {{Form::bsText("harga_lokal",$data->harga_lokal,['class'=>'col-12 double input-right form-control', ])}}
          {{Form::bsText("nilai_produksi_tahun_ini",$data->nilai_produksi_tahun_ini,['class'=>'col-12 double input-right form-control', 'required'=>true])}}
          {{Form::bsText("biaya_pemupukan",$data->biaya_pemupukan,['class'=>'col-12 double input-right form-control', ])}}
          {{Form::bsText("biaya_bibit",$data->biaya_bibit,['class'=>'col-12 double input-right form-control', ])}}
          {{Form::bsText("biaya_obat",$data->biaya_obat,['class'=>'col-12 double input-right form-control', ])}}
          {{Form::bsText("biaya_lainnya",$data->biaya_lainnya,['class'=>'col-12 double input-right form-control', ])}}
          {{Form::bsText("saldo_produksi",$data->saldo_produksi,['class'=>'col-12 double input-right form-control', 'required'=>true])}}
          <?php
          $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
          $select =$data->dijual_langsung_ke_konsumen;
          ?>
          {!!Form::bsRadioInline($list,$select,"dijual_langsung_ke_konsumen",['required'=>true])!!}
          <?php
          $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
          $select =$data->dijual_melalui_kud;
          ?>
          {!!Form::bsRadioInline($list,$select,"dijual_melalui_kud",['required'=>true])!!}
          <?php
          $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
          $select =$data->dijual_melalui_tengkulak;
          ?>
          {!!Form::bsRadioInline($list,$select,"dijual_melalui_tengkulak",['required'=>true])!!}
          <?php
          $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
          $select =$data->dijual_melalui_pengecer;
          ?>
          {!!Form::bsRadioInline($list,$select,"dijual_melalui_pengecer",['required'=>true])!!}
          <?php
          $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
          $select =$data->dijual_ke_lumbung_desa;
          ?>
          {!!Form::bsRadioInline($list,$select,"dijual_ke_lumbung_desa",['required'=>true])!!}
          <?php
          $list = array('ya'=>'YA', 'tidak'=>'TIDAK', );
          $select =$data->tidak_dijual;
          ?>
          {!!Form::bsRadioInline($list,$select,"tidak_dijual",['required'=>true])!!}
          {!!Form::bsSubmit('Simpan',"")!!}
          {!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("potensi/sda/hasil-kebun/delete"), 'name'=>'form-delete-hasil_kebun'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
       var $validator = $("form[name=form-update-hasil_kebun]").validate({
        ignore:[],
        rules: {
        id_desa: {required:true},
        tanggal: {required:true},
        komuditas: {required:true},
        nilai_produksi_tahun_ini: {required:true},
        saldo_produksi: {required:true},
        dijual_langsung_ke_konsumen: {required:true},
        dijual_melalui_kud: {required:true},
        dijual_melalui_tengkulak: {required:true},
        dijual_melalui_pengecer: {required:true},
        dijual_ke_lumbung_desa: {required:true},
        tidak_dijual: {required:true},
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
        if(result){ $("form[name=form-delete-hasil_kebun]").submit();}
        }
        });
        })



        $("#nilai_produksi_tahun_ini").on('focus', function(){
            var datapost = {
                _token:"{{csrf_token()}}",
                luas_perkebunan_swasta_negara: $("#luas_perkebunan_swasta_negara").val(),
                luas_perkebunan_rakyat: $("#luas_perkebunan_rakyat").val(),
                hasil_perkebunan_rakyat: $("#hasil_perkebunan_rakyat").val(),
                hasil_perkebunan_swasta_negara: $("#hasil_perkebunan_swasta_negara").val(),
                harga_lokal: $("#harga_lokal").val(),
            }
            $.post("{{URLGroup('potensi/sda/hasil-kebun/hitung_nilai_produksi')}}",datapost, function(respon){
                $("#nilai_produksi_tahun_ini").val(respon.hasil);
            })
        })

        $("#saldo_produksi").on('focus', function(){
            total = parseNumerik($("#nilai_produksi_tahun_ini").val()) -
                    parseNumerik($("#biaya_pemupukan").val()) -
                    parseNumerik($("#biaya_obat").val()) -
                    parseNumerik($("#biaya_lainnya").val());
            $(this).val(parseDesimal(total));

            var datapost = {
                _token:"{{csrf_token()}}",
                nilai_produksi_tahun_ini: $("#nilai_produksi_tahun_ini").val(),
                biaya_pemupukan: $("#biaya_pemupukan").val(),
                biaya_obat: $("#biaya_obat").val(),
                biaya_lainnya: $("#biaya_lainnya").val(),
            }
            $.post("{{URLGroup('potensi/sda/hasil-kebun/hitung_saldo_produksi')}}",datapost, function(respon){
                $("#saldo_produksi").val(respon.hasil);
            })
        })
        
    })
</script>
@endsection


