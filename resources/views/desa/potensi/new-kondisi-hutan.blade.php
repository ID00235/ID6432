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
    			Kondisi Hutan (Tambah Data Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('potensi/sda/kondisi-hutan')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
                {!!Form::open(['url' => URLGroup("potensi/sda/kondisi-hutan/insert"), 'name'=>'form-insert-kondisi_hutan'])!!}
                {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                {{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                <?php
                $list = array('Hutan Bakau/Mangrove'=>'HUTAN BAKAU/MANGROVE', 'Hutan Lindung'=>'HUTAN LINDUNG', 'Hutan Produksi'=>'HUTAN PRODUKSI', 'Hutan Suaka Alam'=>'HUTAN SUAKA ALAM', 'Hutan Suaka Margasatwa'=>'HUTAN SUAKA MARGASATWA', );
                $select ='Hutan Bakau/Mangrove';
                ?>
                {!!Form::bsSelect($list,$select,"jenis_hutan",[])!!}
                {{Form::bsText("kondisi_baik_ha","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("kondisi_rusak_ha","",['class'=>'col-7 double input-right form-control', ])}}
                {{Form::bsText("jumlah_luas_hutan_ha","",['class'=>'col-7 double input-right form-control',])}}
                {!!Form::bsSubmit('Simpan',"")!!}
                {!!Form::close()!!} 
    		</div>
    	</div>
	</div>
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
                Kondisi Hutan (Tambah Data Baru)
                <div class="pull-right">
                    <a href="{{URLGroup('potensi/sda/kondisi-hutan/air-panas')}}" class="btn btn-secondary">
            Kembali</a>
                </div>
            </div>
            <div class="card-block">     
          
            {!!Form::open(['url' => URLGroup("potensi/sda/kondisi-hutan/insert"), 'name'=>'form-insert-kondisi_hutan'])!!}
{{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
{{Form::bsText("tanggal","",['class'=>'col-7 datepicker form-control','required'=>true])}}
<?php
$list = array('Hutan Bakau/Mangrove'=>'HUTAN BAKAU/MANGROVE', 'Hutan Lindung'=>'HUTAN LINDUNG', 'Hutan Produksi'=>'HUTAN PRODUKSI', 'Hutan Suaka Alam'=>'HUTAN SUAKA ALAM', 'Hutan Suaka Margasatwa'=>'HUTAN SUAKA MARGASATWA', );
$select ='Hutan Bakau/Mangrove';
?>
{!!Form::bsSelect($list,$select,"jenis_hutan",[])!!}
{{Form::bsText("kondisi_baik_ha","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("kondisi_rusak_ha","",['class'=>'col-7 double input-right form-control', ])}}
{{Form::bsText("jumlah_luas_hutan_ha","",['class'=>'col-7 numerik input-right form-control',])}}
{!!Form::bsSubmit('Simpan',"")!!}
{!!Form::close()!!} 

            </div>
        </div>
    </div>
>>>>>>> bf374fafa367b04939d704a3e6822196f8a44008
</div>
@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
<<<<<<< HEAD
        var $validator = $("form[name=form-insert-kondisi_hutan]").validate({
        ignore:[],
        rules: {
        id_desa: {required:true},
        tanggal: {required:true},
        jenis_hutan: {required:true},
        },
        messages: {
        },
        submitHandler: function(form) {
        form.submit();
        }
        });

        $("#jumlah_luas_hutan_ha").on('focus', function(){
            total = parseNumerik($("#kondisi_baik_ha").val()) + 
                    parseNumerik($("#kondisi_rusak_ha").val()) ;
            $(this).val(parseDesimal(total));
        })
    })
=======
     var $validator = $("form[name=form-insert-kondisi_hutan]").validate({
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
     $("#jumlah_luas_hutan_ha").on('focus',function(){
        total = parseNumerik($("#kondisi_baik_ha").val()) +
                parseNumerik($("#kondisi_rusak_ha").val());

                $(this).val(parseDesimal(total))
     })
 


});
    
>>>>>>> bf374fafa367b04939d704a3e6822196f8a44008
</script>
@endsection


