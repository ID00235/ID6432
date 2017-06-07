<?php
$id_desa = Auth::user()->userdesa();
?>
@extends('layout')
@section("pagetitle",$route['title'])
@section("container")
@include("desa.navbar-sub.ddk")
<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data Dasar Keluarga</a></li>
            <li class="breadcrumb-item active">Anggota Keluarga</li>
        </ol>
	</div>
	<div class="offset-sm-2 col-md-8">
		<div class="card">
			<div class="card-header">
    			Anggota Keluarga (Tambah Anggota Keluarga Baru)
    			<div class="pull-right">
    				<a href="{{URLGroup('ddk/kepala-keluarga/anggota-keluarga/'.Hashids::encode($kepala_keluarga->id))}}" class="btn btn-secondary">
            Kembali</a>
    			</div>
  			</div>
  			<div class="card-block">	
            Nomor KK / Kepala Keluarga :<br>
        <b>{{$kepala_keluarga->nomor_kk}} / {{$kepala_keluarga->nama_kepala_keluarga}}</b><br><br> 
                {!!Form::open(['url' => URLGroup("ddk/kepala-keluarga/anggota-keluarga/".Hashids::encode($kepala_keluarga->id)."/insert"), 'name'=>'form-insert-anggota_keluarga'])!!}
                {{Form::hidden("id_desa",Hashids::encode(Auth::user()->userdesa()))}}
                {{Form::hidden("id_kk",Hashids::encode($kepala_keluarga->id))}}
                {{Form::bsText("no_urut","",['class'=>'col-7 numerik input-right form-control','required'=>true])}}
                {{Form::bsText("nik","",['required'=>true])}}
                {{Form::bsText("nama_lengkap","",['required'=>true])}}
                {{Form::bsText("no_akte_kelahiran","",[])}}
                <?php
                $list = array('Adik'=>'ADIK', 'Anak Angkat'=>'ANAK ANGKAT', 'Anak Kandung'=>'ANAK KANDUNG', 'Anak Tiri'=>'ANAK TIRI', 'Ayah'=>'AYAH', 'Cucu'=>'CUCU', 'Famili lain'=>'FAMILI LAIN', 'Ibu'=>'IBU', 'Istri'=>'ISTRI', 'Kakak'=>'KAKAK', 'Kakek'=>'KAKEK', 'Kepala Keluarga'=>'KEPALA KELUARGA', 'Keponakan'=>'KEPONAKAN', 'Menantu'=>'MENANTU', 'Mertua'=>'MERTUA', 'Nenek'=>'NENEK', 'Paman'=>'PAMAN', 'Sepupu'=>'SEPUPU', 'Suami'=>'SUAMI', 'Tante'=>'TANTE', 'Teman'=>'TEMAN', );
                $select ='Adik';
                ?>
                {!!Form::bsSelect($list,$select,"hubungan_keluarga",['required'=>true])!!}
                <?php
                $list = array('Laki-Laki'=>'LAKI-LAKI', 'Perempuan'=>'PEREMPUAN', );
                $select ='Laki-Laki';
                ?>
                {!!Form::bsSelect($list,$select,"jenis_kelamin",['required'=>true])!!}
                {{Form::bsText("tempat_lahir","",['required'=>true])}}
                {{Form::bsText("tanggal_lahir","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                {{Form::bsText("tanggal_pencatatan","",['class'=>'col-7 datepicker form-control','required'=>true])}}
                <?php
                $list = array('Belum Kawin'=>'BELUM KAWIN', 'Kawin'=>'KAWIN', 'Janda/Duda'=>'JANDA/DUDA', );
                $select ='Belum Kawin';
                ?>
                {!!Form::bsSelect($list,$select,"status_kawin",['required'=>true])!!}
                <?php
                $list = array('Islam'=>'ISLAM', 'Kristen'=>'KRISTEN', 'Hindu'=>'HINDU', 'Budha'=>'BUDHA', 'Katolik'=>'KATOLIK', 'Konghucu'=>'KONGHUCU', 'Kepercayaan'=>'KEPERCAYAAN', );
                $select ='Islam';
                ?>
                {!!Form::bsSelect($list,$select,"agama",['required'=>true])!!}
                <?php
                $list = DB::table('pendidikan')->pluck('nama_pendidikan','id');
                $select = "";
                ?>
                {!!Form::bsSelect($list, $select, 'pendidikan', ['required'=>true])!!}
                <?php
                $list = DB::table('pekerjaan')->pluck('nama_pekerjaan','id');
                $select = "";
                ?>
                {!!Form::bsSelect($list, $select, 'pekerjaan', ['required'=>true])!!}
                <?php
                $list = array('Tidak Ada'=>'TIDAK ADA', 'Sumbing'=>'SUMBING', 'Tuna Netra'=>'TUNA NETRA', 'Tuna Rungu'=>'TUNA RUNGU', 'Tuna Wicara'=>'TUNA WICARA', 'Lumpuh'=>'LUMPUH', );
                $select ='Tidak Ada';
                ?>
                {!!Form::bsSelect($list,$select,"cacat_fisik",['required'=>true])!!}
                <?php
                $list = array('Tidak Ada'=>'TIDAK ADA', 'Gila'=>'GILA', 'Stress'=>'STRESS', 'Idiot'=>'IDIOT', );
                $select ='Tidak Ada';
                ?>
                {!!Form::bsSelect($list,$select,"cacat_mental",['required'=>true])!!}
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
        var $validator = $("form[name=form-insert-anggota_keluarga]").validate({
        ignore:[],
        rules: {
        id_desa: {required:true},
        id_kk: {required:true},
        no_urut: {required:true},
        nik: {required:true},
        nama_lengkap: {required:true},
        hubungan_keluarga: {required:true},
        jenis_kelamin: {required:true},
        tempat_lahir: {required:true},
        tanggal_lahir: {required:true},
        tanggal_pencatatan: {required:true},
        status_kawin: {required:true},
        agama: {required:true},
        pendidikan: {required:true},
        pekerjaan: {required:true},
        cacat_fisik: {required:true},
        cacat_mental: {required:true},
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


