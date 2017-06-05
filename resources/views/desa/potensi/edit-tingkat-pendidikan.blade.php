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
            <li class="breadcrumb-item">Sumber Daya Manusia</li>
            <li class="breadcrumb-item active">Tingkat Pendidikan</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Tingkat Pendidikan (Edit Data)
    			<div class="pull-right">
            <a href="#" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
    				<a href="{{URLGroup('potensi/sdm/tingkat-pendidikan')}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	 
          {!!Form::open(['url' => URLGroup("potensi/sdm/tingkat-pendidikan/update"), 'name'=>'form-update-tingkat_pendidikan'])!!}
          {{Form::hidden("id",Crypt::encrypt($data->id))}}
          <?php
          $list = array('Usia 3 - 6 tahun yang sedang TK/play group'=>'USIA 3 - 6 TAHUN YANG SEDANG TK/PLAY GROUP', 'Usia 7 - 18 tahun yang tidak pernah sekolah'=>'USIA 7 - 18 TAHUN YANG TIDAK PERNAH SEKOLAH', 'Usia 7 - 18 tahun yang sedang sekolah'=>'USIA 7 - 18 TAHUN YANG SEDANG SEKOLAH', 'Usia 18 - 56 tahun tidak pernah sekolah'=>'USIA 18 - 56 TAHUN TIDAK PERNAH SEKOLAH', 'Usia 18 - 56 tahun pernah SD tetapi tidak tamat'=>'USIA 18 - 56 TAHUN PERNAH SD TETAPI TIDAK TAMAT', 'Usia 12 - 56 tahun tidak tamat SLTP'=>'USIA 12 - 56 TAHUN TIDAK TAMAT SLTP', 'Usia 18 - 56 tahun tidak tamat SLTA'=>'USIA 18 - 56 TAHUN TIDAK TAMAT SLTA', 'Tamat SD/sederajat'=>'TAMAT SD/SEDERAJAT', 'Tamat SMP/sederajat'=>'TAMAT SMP/SEDERAJAT', 'Tamat SMA/sederajat'=>'TAMAT SMA/SEDERAJAT', 'Tamat D-1/sederajat'=>'TAMAT D-1/SEDERAJAT', 'Tamat D-2/sederajat'=>'TAMAT D-2/SEDERAJAT', 'Tamat D-3/sederajat'=>'TAMAT D-3/SEDERAJAT', 'Tamat S-1/sederajat'=>'TAMAT S-1/SEDERAJAT', 'Tamat S-2/sederajat'=>'TAMAT S-2/SEDERAJAT', 'Tamat S-3/sederajat'=>'TAMAT S-3/SEDERAJAT', 'Tamat SLB A'=>'TAMAT SLB A', 'Tamat SLB B'=>'TAMAT SLB B', 'Tamat SLB C'=>'TAMAT SLB C', );
          $select =$data->tingkat_pendidikan;
          ?>
          {!!Form::bsSelect($list,$select,"tingkat_pendidikan",['required'=>true])!!}
          {{Form::bsText("laki_laki",$data->laki_laki,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
          {{Form::bsText("perempuan",$data->perempuan,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
          {{Form::bsText("jumlah",$data->jumlah,['class'=>'col-12 numerik input-right form-control','required'=>true])}}
          {!!Form::bsSubmit('Simpan',"")!!}
          {!!Form::close()!!} 
    		</div>
    	</div>
	</div>
</div>
@endsection
@section("modal")
  
  {!!Form::open(['url' => URLGroup("potensi/sdm/tingkat-pendidikan/delete"), 'name'=>'form-delete-tingkat_pendidikan'])!!}
{{Form::hidden("id",Crypt::encrypt($data->id))}}
{!!Form::close()!!} 

@endsection
@section("javascript")
<script type="text/javascript">
    $(function(){
        var $validator = $("form[name=form-update-tingkat_pendidikan]").validate({
        ignore:[],
        rules: {
        id_desa: {required:true},
        tingkat_pendidikan: {required:true},
        laki_laki: {required:true},
        perempuan: {required:true},
        jumlah: {required:true},
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
        if(result){ $("form[name=form-delete-tingkat_pendidikan]").submit();}
        }
        });
        })

        $("#jumlah").on('focus', function(){
            total = parseInt($("#laki_laki").val())
                    +  parseInt ($("#perempuan").val());
            $(this).val((total));
        })
        
    })
</script>
@endsection


