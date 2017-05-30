<?php
namespace App\Http\Controllers\Desa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use URL;
use DB;
use Validator;
use Yajra\Datatables\Datatables;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use App\User;
//model (table) yang digunakan
use App\Models\IdentitasDesa;
use App\Models\BatasWilayah;


class PotensiIdentitasController  extends Controller{

	function index(){
		$route = array("main"=>"potensi","sub"=>"identitas","title"=>"Potensi - Identitas Desa");
    	return view('desa.potensi.identitas-desa',array("route"=>$route));
	}

	function editidentitas(){
		$route = array("main"=>"potensi","sub"=>"identitas","title"=>"Potensi - Edit Identitas Desa");
    	return view('desa.potensi.edit-identitas-desa',array("route"=>$route));
	}

	function updateidentitas(Request  $req){
		$id_desa = Crypt::decrypt($req->input('id_desa'));
		$identitas = IdentitasDesa::find($id_desa);
		if($identitas){
			$identitas->luas_desa = system_numerik($req->input("luas_desa"));
			$identitas->garis_lintang = system_numerik($req->input("garis_lintang"));
			$identitas->garis_bujur = system_numerik($req->input("garis_bujur"));
			$identitas->tinggi_dpl = system_numerik($req->input("tinggi_dpl"));
			$identitas->status = $req->input("status");
			$identitas->berbatas_negara = $req->input("berbatas_negara");
			$identitas->berbatas_kabupaten = $req->input("berbatas_kabupaten");
			$identitas->berbatas_provinsi = $req->input("berbatas_provinsi");
			$identitas->berbatas_kecamatan = $req->input("berbatas_kecamatan");
			$identitas->save();
			$req->session()->flash('notice', "<p>Update Data IdeEEntitas Desa <br><b>Berhasil</b></p>");
			return redirect(URLGroup('potensi'));
		}else{
			throw new HttpException(404);
		}
	}

		
}