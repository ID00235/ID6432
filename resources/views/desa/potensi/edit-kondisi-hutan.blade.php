<?php
$id_desa = Auth::user()->userdesa();
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.potensi")
<div class="row">
<<<<<<< HEAD
	<div class="col-md-12">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Potensi</a></li>
            <li class="breadcrumb-item">Sumber Daya Alam</li>
            <li class="breadcrumb-item active">Kondisi Hutan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Kondisi Hutan (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sda/kondisi-hutan')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          {!!Form::open(['url' => URLGroup("potensi/sda/kondisi-hutan/update"), 'name'=>'form-update-kondisi_hutan'])!!}
          {{Form::hidden("id",Crypt::encrypt($data->id))}}
          {{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
          <?php
          $list = array('Hutan Bakau/Mangrove'=>'HUTAN BAKAU/MANGROVE', 'Hutan Lindung'=>'HUTAN LINDUNG', 'Hutan Produksi'=>'HUTAN PRODUKSI', 'Hutan Suaka Alam'=>'HUTAN SUAKA ALAM', 'Hutan Suaka Margasatwa'=>'HUTAN SUAKA MARGASATWA', );
          $select =$data->jenis_hutan;
          ?>
          {!!Form::bsSelect($list,$select,"jenis_hutan",[])!!}
          {{Form::bsText("kondisi_baik_ha",$data->kondisi_baik_ha,['class'=>'col-12 double input-right form-control', ])}}
          {{Form::bsText("kondisi_rusak_ha",$data->kondisi_rusak_ha,['class'=>'col-12 double input-right form-control', ])}}
          {{Form::bsText("jumlah_luas_hutan_ha",$data->jumlah_luas_hutan_ha,['class'=>'col-12 double input-right form-control', ])}}
          {!!Form::bsSubmit('Simpan',"")!!}
          {!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("potensi/sda/kondisi-hutan/delete"), 'name'=>'form-delete-kondisi_hutan'])!!}
=======
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Potensi</a></li>
            <li class="breadcrumb-item">Kehutanan</li>
            <li class="breadcrumb-item active">Kondisi Hutan</li>
        </ol>
    </div>
    <div class="offset-sm-2 col-md-8">
        <div class="card">
            <div class="card-header">
                Kondisi Hutan (Edit Data)
                <div class="pull-right">
          <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                    <a href="{{URLGroup('potensi/sda/kondisi-hutan/jenis-lahan')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">
        {!!Form::open(['url' => URLGroup("potensi/sda/kondisi-hutan/update"), 'name'=>'form-update-kondisi_hutan'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{{Form::bsText("tanggal",tanggalIndo($data->tanggal),['class'=>'col-4 datepicker form-control','required'=>true])}}
<?php
$list = array('Hutan Bakau/Mangrove'=>'HUTAN BAKAU/MANGROVE', 'Hutan Lindung'=>'HUTAN LINDUNG', 'Hutan Produksi'=>'HUTAN PRODUKSI', 'Hutan Suaka Alam'=>'HUTAN SUAKA ALAM', 'Hutan Suaka Margasatwa'=>'HUTAN SUAKA MARGASATWA', );
$select =$data->jenis_hutan;
?>
{!!Form::bsSelect($list,$select,"jenis_hutan",[])!!}
{{Form::bsText("kondisi_baik_ha",$data->kondisi_baik_ha,['class'=>'col-12 double input-right form-control', ])}}
{{Form::bsText("kondisi_rusak_ha",$data->kondisi_rusak_ha,['class'=>'col-12 double input-right form-control', ])}}
{{Form::bsText("jumlah_luas_hutan_ha",$data->jumlah_luas_hutan_ha,['class'=>'col-12 numerik input-right form-control',])}}
{!!Form::bsSubmit('Simpan',"")!!}
{!!Form::close()!!} 




            </div>
        </div>
    </div>
</div>
@endsection
@section("modal")

{!!Form::open(['url' => URLGroup("potensi/sda/kondisi-hutan/delete"), 'name'=>'form-delete-kondisi_hutan'])!!}
>>>>>>> bf374fafa367b04939d704a3e6822196f8a44008
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection
<<<<<<< HEAD
@section("javascript")
<script type="text/javascript">
    $(function(){
        var $validator = $("form[name=form-update-kondisi_hutan]").validate({
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
          if(result){ $("form[name=form-delete-kondisi_hutan]").submit();}
          }
          });
          })

          $("#jumlah_luas_hutan_ha").on('focus', function(){
            total = parseNumerik($("#kondisi_baik_ha").val()) + 
                    parseNumerik($("#kondisi_rusak_ha").val()) ;
            $(this).val(parseDesimal(total));
        })
    })
</script>
@endsection


=======

@section("javascript")
<script type="text/javascript">
    $(function(){
var $validator = $("form[name=form-update-kondisi_hutan]").validate({
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
if(result){ $("form[name=form-delete-kondisi_hutan]").submit();}
}
});
})

 $("#jumlah_luas_hutan_ha").on('focus',function(){
        total = parseNumerik($("#kondisi_baik_ha").val()) +
                parseNumerik($("#kondisi_rusak_ha").val());

                $(this).val(parseDesimal(total))
     })


    })
</script>
@endsection
>>>>>>> bf374fafa367b04939d704a3e6822196f8a44008
