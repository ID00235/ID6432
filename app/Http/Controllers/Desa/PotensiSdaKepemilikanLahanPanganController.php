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
use Vinkla\Hashids\Facades\Hashids;
use App\User;
//model (table) yang digunakan
use App\Models\KepemilikanLahanPangan;

class PotensiSdaKepemilikanLahanPanganController extends Controller{


		function listKepemilikanLahanPangan(){
			$id_desa = Auth::user()->userdesa();
			$data = KepemilikanLahanPangan::where('id_desa',$id_desa)->get();
			$route = array("main"=>"potensi","sub"=>"batas_wilayah","title"=>"Potensi - Kepemilikan Lahan Pangan");
			return view('desa.potensi.list-kepemilikan-lahan-pangan',array("route"=>$route, "data"=>$data));
		}


		function newKepemilikanLahanPangan(){
			$route = array("main"=>"potensi","sub"=>"batas_wilayah","title"=>"Potensi - Kepemilikan Lahan Pangan");
			return view('desa.potensi.new-kepemilikan-lahan-pangan',array("route"=>$route));
		}

}
